<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id('department_id');
            $table->string('department_name');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->timestamps();
            
            $table->foreign('location_id')->references('location_id')->on('locations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
};