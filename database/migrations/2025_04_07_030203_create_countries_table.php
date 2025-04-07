<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id('country_id');
            $table->string('country_name');
            $table->unsignedBigInteger('region_id');
            $table->timestamps();
            
            $table->foreign('region_id')->references('region_id')->on('regions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
};