<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->string('seo_title')->nullable();
            $table->longText('seo_description')->nullable();
            $table->longText('seo_keyword')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('pages')->insert([[
            'id' => 1,
            'name' => 'about',
            'slug' => 'about',
            'description_en' => 'change this in dashboard',
            'description_ar' => 'change this in dashboard',
            'seo_title' => 'change this in dashboard',
            'seo_description' => 'change this in dashboard',
            'seo_keyword' => 'change this in dashboard',
            'created_at'=> Carbon::now(),
        ],[
            'id' => 2,
            'name' => 'privacy',
            'slug' => 'privacy',
            'description_en' => 'change this in dashboard',
            'description_ar' => 'change this in dashboard',
            'seo_title' => 'change this in dashboard',
            'seo_description' => 'change this in dashboard',
            'seo_keyword' => 'change this in dashboard',
            'created_at'=> Carbon::now(),
        ]]);
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
