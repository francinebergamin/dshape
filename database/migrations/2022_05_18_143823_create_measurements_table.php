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
        Schema::create('measurements', function (Blueprint $table) {
            $table->id(); //php artisan make:model Meansuraments -mc
            $table->date('date');
            $table->double('weight');
            $table->double('height');
            $table->double('chest');
            $table->double('left_arm');
            $table->double('right_arm');
            $table->double('abdomen');
            $table->double('waist');
            $table->double('hips');
            $table->double('left_thigh');
            $table->double('right_thigh');
            $table->double('left_calf');
            $table->double('right_calf');
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
      Schema::dropIfExists('measurements');
    }

};
