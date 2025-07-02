<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name'); 
            $table->integer('roll');
            $table->integer('registration');
            $table->string('email');
            $table->string('phone');
            $table->string('religion');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('blood_group');
            $table->text('address');
            // $table->integer('dept_id');
            // $table->string('semester');
            // $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
