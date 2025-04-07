<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
         
            $table->id('employee_id');
            
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100)->unique();
            $table->string('phone_number', 20)->nullable();
            $table->date('hire_date');
            $table->decimal('salary', 10, 2);
            
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            
            $table->timestamps();
            
            $table->foreign('job_id')
                  ->references('job_id')
                  ->on('hr_jobs')
                  ->onDelete('cascade');
            
            $table->foreign('manager_id')
                  ->references('employee_id')
                  ->on('employees')
                  ->onDelete('set null');
            
            $table->foreign('department_id')
                  ->references('department_id')
                  ->on('departments')
                  ->onDelete('set null');
            
            $table->index('last_name');
            $table->index('email');
            $table->index(['last_name', 'first_name']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};