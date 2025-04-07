<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id('location_id');
            $table->string('street_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city');
            $table->string('state_province')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->timestamps();
            
            $table->foreign('country_id')->references('country_id')->on('countries');
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
};