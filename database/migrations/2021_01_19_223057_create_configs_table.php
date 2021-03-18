<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('facebook_page')->nullable();
            $table->string('twitter_page')->nullable();
            $table->string('instagram_page')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('scraped_data_cost')->nullable();
            $table->string('free_point_in_register')->nullable();
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_secret')->nullable();
            $table->string('seo_title')->nullable();
            $table->longText('seo_description')->nullable();
            $table->longText('seo_keyword')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('configs')->insert([
            'name' => 'demo',
            'facebook_page' => 'facebook url',
            'twitter_page' => 'twitter url',
            'instagram_page' => 'instagram url',
            'email' => 'demo@exemple.com',
            'phone' => '00xxxxxxxx',
            'scraped_data_cost' => '10',
            'free_point_in_register' => '1000',
            'paypal_client_id' => 'demo',
            'paypal_secret' => 'demo',
            'seo_title' => 'demo_title',
            'seo_description' => 'demo',
            'seo_keyword' => 'demo , demo , demo , demo',
            'created_at'=> Carbon::now(),
        ]);
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
