<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('fname');
            $table->string('sname');
            $table->string('gender')->nullable();
            $table->string('whatsapp_contact')->nullable();
            $table->string('other_contact')->nullable();
            $table->string('facebook_handle')->nullable();
            $table->integer('programme_id')->nullable();
            $table->string('level')->nullable();
            $table->text('bio')->nullable();
            $table->string('image')->default('img.jpg');
            $table->string('password');
            $table->integer('online_status')->nullable()->unsigned();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
