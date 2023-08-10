<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            // $table->id();
            $table->string('animal_type');
            $table->string('breed')->nullable();
            $table->string('age')->nullable();
            $table->string('spayed')->nullable();
            $table->string('gender')->nullable();
            $table->string('color_markings')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('weight')->nullable();
            $table->string('animal_code')->primary();
            $table->text('vaccination_history')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('owner_info')->nullable();
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
        Schema::dropIfExists('animals');
    }
}
