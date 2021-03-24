<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_enrollments', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('ac_course_id')->unsigned();
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->foreign('ac_course_id')
                    ->references('id')
                    ->on('ac_courses')
                    ->onDelete('cascade');
            $table->primary(['user_id', 'ac_course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ac_enrollments');
    }
}
