<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->default(0);
            $table->string('code',50)->unique()->default('');
            $table->string('type',50)->default('');
            $table->string('store_range',100)->default('');
            $table->text('value')->nullable();
            $table->unsignedInteger('sort_order')->default(100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}
