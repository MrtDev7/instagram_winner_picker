<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;


class LoginController extends Controller
{

    /*

    public function admin(Request $request)
    {

        $user= Admin::where(function($query) use ($request) {
            $query->where('email', $request->emailorphone);
            $query->orWhere('phone', $request->emailorphone);
        })->where('password', $request->password)->first();
        if (!$user) {
            return response(['errore'=>'wrong email or password'], 201);
        }
        $token = $user->createToken('user_admin')->plainTextToken;
        $response = [
            'user' =>  $user,
            'token' => $token
        ];
        return response($response, 201);
    }
     */

    public function user(LoginRequest  $loginRequest)
    {

        $user= User::where(function($query) use ($request) {
            $query->where('email', $request->emailorphone);
            $query->orWhere('phone', $request->emailorphone);
        })->where('password', $request->password)->first();

        $response = $user;

        if (!$user) {
            //// err feedback
            return redirect()->to('/');
        }

        Auth::guard('web')->login($user);
        return redirect()->to('/');


    }
    public function emailVerification($id)
    {

        $data =  User::find($id);
        $url= URL::SignedRoute(
            'emailverification', ['id' => $id]);

        $details = [
            'subject' => 'Welcome to ' .config('app.name'),
            'title' => 'New registration: Email verification',
            'url' => $url,
            'body' => 'This email is used to verify that the email address you provided is real.
                Please click on the link :'
        ];

        Mail::to($data->email)->send(new Emailverification($details));;

        return redirect()->to('/');




    }
    public function emailverification_back($id)
    {
        $data =  User::find($id);
        if ($data->email_verification_at==null) {
            $data->email_verification_at = Carbon::now()->toDateTimeString();

            $data->save();


            Auth::login($data);

        }
        return redirect()->to('/');



    }
    public function resetPassword(Request $request,$for='admin')
    {
        if ($for='admin') {
            $data =  Admin::where('email',$request->email)->first();
        }else{
            $data =  User::where('email',$request->email)->first();
        }
        if (!$data) {
            return response(['errore'=>'wrong email or password'], 201);
        }
        if ($data) {
            $url= URL::temporarySignedRoute(
                'passwordreset', now()->addMinutes(60), ['id' => $data->id]);

            $details = [
                'subject' => 'Password reset for ' .config('app.name'),
                'title' => 'Password reset',
                'password' => ' Password : '.$data->makeVisible(['password'])->password,
                'body' => 'This email is sended for a password  reminder..'
            ];

            Mail::to($data->email)->send(new Emailverification($details));;

            return redirect()->to('dashboard/login');
        }
    }
    public function passwordreset_back($id,$for='admin')
    {
        if ($for='admin') {
            $data =  Admin::find($id);
        }else{
            $data =  User::find($id);
        }
        if ($data) {
            Auth::login($data);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->to('/');
    }
    public function register(Request $request)
    {
        $data = new User;
        $config= Config::first();
        $data->name = request('name');
        $data->email = request('email');

        $data->password = request('password');

        $data->adress = request('adress');
        $data->phone = request('phone');
        $data->point = request('point')==null ? $config->free_point_in_register :request('point') ;
        $data->save();
        $this->emailverification($data->id);
        Auth::guard('web')->login($data);
        return redirect()->to('/');
    }

}
