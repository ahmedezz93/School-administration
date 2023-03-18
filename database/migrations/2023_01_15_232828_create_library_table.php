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
        Schema::create('library', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_name');
            $table->foreignId('teacher_id')->constrained('teachers');
            $table->foreignId('grade_id')->constrained('grades');
            $table->foreignId('class_id')->constrained('classrooms');
            $table->foreignId('section_id')->constrained('sections');
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
        Schema::dropIfExists('library');
    }
};
