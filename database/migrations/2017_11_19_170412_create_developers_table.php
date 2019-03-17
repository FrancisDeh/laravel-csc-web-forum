<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('sname');
            $table->string('email')->unique();
            $table->text('description');
            $table->string('work_field');
            $table->string('fbhandle');
            $table->string('twitterhandle');
            $table->string('gplushandle')->nullable();
            $table->string('linkedinhandle')->nullable();
            $table->string('instagramhandle')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('developers');
    }
}
