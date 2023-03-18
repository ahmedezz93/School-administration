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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('current_year');
            $table->string('Abbreviated_school_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('school_address');
            $table->string('The_end_of_the_first_term');
            $table->string('The_end_of_the_second_term');
            $table->string('file_name');
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
        Schema::dropIfExists('settings');
    }
};
