<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name'); 
            $table->integer('roll');
            $table->integer('registration');
            $table->string('email');
            $table->string('phone');
            $table->string('religion');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('blood_group');
            $table->string('address');
            // $table->integer('dept_id');
            // $table->string('semester');
            // $table->string('image');
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
        Schema::dropIfExists('students');
    }
}
