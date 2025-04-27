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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('indonesia_provinces');
            $table->foreignId('city_id')->constrained('indonesia_cities');
            $table->foreignId('district_id')->constrained('indonesia_districts');
            $table->foreignId('village_id')->constrained('indonesia_villages');
            $table->foreignId('education_id')->constrained('education');
            $table->foreignId('employment_id')->constrained('employments');
            $table->string('name');
            $table->string('address');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('phone');
            $table->string('marital_status');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('guardian_name');
            $table->string('identity_number');
            $table->string('allergy');
            $table->boolean('is_employee')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
