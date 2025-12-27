<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('specialty_id');
            $table->string('title');
            $table->text('content');
            $table->enum('gender', ['male', 'female']);
            $table->integer('age');
            $table->text('medical_history')->nullable();
            $table->enum('status', ['pending', 'answered'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('patients');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('specialty_id')->references('id')->on('specialties');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
