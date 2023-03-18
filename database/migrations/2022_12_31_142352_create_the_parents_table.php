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
        Schema::create('the_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Fatherinformation
            $table->string('name_Father');
            $table->string('national_id_Father');
            $table->string('passport_id_Father');
            $table->string('phone_father');
            $table->string('job_father');
            $table->foreignId('nationality_father_id')->constrained('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('blood_type_father_id')->constrained('bloods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('religion_father_id')->constrained('religions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('address_father');

            //Mother information
            $table->string('name_mother');
            $table->string('national_id_mother');
            $table->string('passport_id_mother');
            $table->string('phone_mother');
            $table->string('job_mother');
            $table->foreignId('nationality_Mother_id')->constrained('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('blood_type_mother_id')->constrained('bloods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('religion_mother_id')->constrained('religions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('address_Mother');
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
        Schema::dropIfExists('the_parents');
    }
};
