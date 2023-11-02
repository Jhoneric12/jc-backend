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
            $table->id('patient_id')->startingValue(100000);
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->integer('age');
            $table->string('civil_status');
            $table->string('gender');
            $table->text('home_address');
            $table->string('contact_number');
            $table->string('religion');
            $table->string('username')->unique();
            $table->string('email_address');
            $table->string('password');
            $table->integer('otp');
            $table->string('photo')->nullable();
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
