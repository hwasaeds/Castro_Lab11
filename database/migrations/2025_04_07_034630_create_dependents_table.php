<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dependents', function (Blueprint $table) {
            // Primary Key
            $table->id('dependent_id');
            
            // Dependent Details
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('relationship', 25); // 'child', 'spouse', 'parent', etc.
            
            // Foreign Key
            $table->unsignedBigInteger('employee_id');
            
            // Timestamps
            $table->timestamps();
            
            // Foreign Key Constraint
            $table->foreign('employee_id')
                  ->references('employee_id')
                  ->on('employees')
                  ->onDelete('cascade');
            
            // Indexes
            $table->index('last_name');
            $table->index('employee_id');
            $table->index(['last_name', 'first_name']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('dependents');
    }
};