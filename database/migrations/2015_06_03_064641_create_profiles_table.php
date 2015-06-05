<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('profiles', function(Blueprint $table) {
            $gender = [
                '0' => "男",
                '1' => "女",
            ];
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('image_path')->nullable();
            $table->text('profile')->nullable();
            $table->text('familyname')->nullable();
            $table->text('firstname')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('gender', array_keys($gender))->nullable();
            $table->string('street_address')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }

}
