<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_name');
            $table->string('category');
            $table->string('manufacturer');
            $table->string('batch_number');
            $table->date('expiration_date');
            $table->string('quantity');
            $table->string('unit_of_measurement');
            $table->date('purchase_date');
            $table->string('supplier');
            $table->decimal('purchase_price', 8, 0);
            $table->decimal('selling_price', 8, 0);
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('medicines');
    }
}
