<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('cars')->truncate();

        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn("brand");
            $table->dropColumn("color");
            $table->unsignedBigInteger("color_id")->index();
            $table->unsignedBigInteger("brand_id")->index();

            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
            $table->foreign('brand_id')
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
        Schema::table('cars', function (Blueprint $table) {
            $table->string("brand");
            $table->string("color");

            $table->dropColumn("color_id");
            $table->dropColumn("brand_id");
        });
    }
};
