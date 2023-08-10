<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagonosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagonoses', function (Blueprint $table) {
            $table->id();
            $table->string('animal_code');
            $table->text('medical_history');
            $table->text('physical_exam_findings');
            $table->text('diagnostic_tests');
            $table->text('other_diagnostic_procedures');
            $table->text('assessment_diagnosis');
            $table->timestamps();
            // Define foreign key relationship
            $table->foreign('animal_code')->references('animal_code')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagonoses');
    }
}
