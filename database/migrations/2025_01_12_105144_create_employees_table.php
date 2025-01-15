<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
                $table->string('middle_name');
                $table->string('last_name');
                $table->string('email');
                 $table->string('address');
                 $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete();
                 $table->foreignId('state_id')->constrained('states')->cascadeOnDelete();
                 $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
                 $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
                 $table->char('zip_code',10);
                 $table->date('date_birth')->nullable();
                 $table->date('date_hired')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};