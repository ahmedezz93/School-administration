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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('from_grade')->constrained('grades');
            $table->foreignId('from_class')->constrained('classrooms');
            $table->foreignId('from_section')->constrained('sections');
            $table->foreignId('to_grade')->constrained('grades');
            $table->foreignId('to_class')->constrained('classrooms');
            $table->foreignId('to_section')->constrained('sections');
            $table->string('from_date');
            $table->string('to_date');
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
        Schema::dropIfExists('promotions');
    }
};
