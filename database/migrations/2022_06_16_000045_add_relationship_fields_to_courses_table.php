<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('course_category_id')->nullable();
            $table->foreign('course_category_id', 'course_category_fk_6808682')->references('id')->on('course_categories');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id', 'teacher_fk_6802207')->references('id')->on('users');
        });
    }
}
