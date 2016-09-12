<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_msgs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0);
            $table->unsignedInteger('to_user_id')->default(0);
            $table->string('type',50)->default('[用户消息]');
            $table->text('info');
            $table->dateTime('add_time')->nullable();
            $table->string('ip',50)->default('');
            $table->boolean('is_read')->default(false);
            $table->dateTime('read_time')->nullable();
            $table->boolean('is_delete')->default(false);
            $table->dateTime('delete_time')->nullable();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_msgs');
    }
}
