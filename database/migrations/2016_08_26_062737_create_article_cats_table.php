<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_cats', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('title',255)->default('')->comment('');
            $table->unsignedInteger('sort_order')->default(100)->comment('');
            $table->dateTime('add_time')->nullable()->comment('');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_cats');
    }
}
