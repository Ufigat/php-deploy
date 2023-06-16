<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_cars', function (Blueprint $table) {
            $table->unsignedBigInteger("person_id");
            $table->unsignedBigInteger("car_id");
            $table->index(['person_id', 'car_id']);
            $table->foreign('person_id')
                   ->references('id')
                   ->on('persons')
                   ->onDelete('cascade');
            $table->foreign('car_id')
                ->references('id')
                ->on('cars')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_cars');
    }
};
