<?php

namespace App\Http\Controllers;


use App\Models\Config;
use App\Models\Faq;
use App\Models\Pack;
use App\Models\Page;

class PageController extends Controller
{
    public function index() {

        $config = Config::first();
        $faq = Faq::latest()->get();
        $pack = Pack::latest()->get();

        return view('home', ['config' => $config, 'faq' => $faq, 'packs' => $pack]);

    }

    public function about() {

        $page =  Page::find(1);
        $config = Config::first();

        if($page === null){
            return 'please create about content';
        }
        return view('page'  , [ 'config' => $config ,'page' => $page]);

    }

    public function privacy() {

        $page =  Page::find(2);
        $config = Config::first();

        if($page === null){
            return 'please create privacy content';
        }
        return view('page'  , [ 'page' => $page ,'config' => $config]);
    }

    public function instagram(){
        $config = Config::first();
        return view('instagram' , ['config' => $config]);
    }

}
