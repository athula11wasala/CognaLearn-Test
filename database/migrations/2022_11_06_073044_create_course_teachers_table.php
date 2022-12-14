<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->foreignId('teacher_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('teacher_id')->references('id')->on('teachers');
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
        Schema::table('course_teachers',  function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropForeign(['teacher_id']);
        });

        Schema::dropIfExists('course_teachers');
    }
}
