<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tutor_id');
            $table->unsignedInteger('ac_topic_id');
            $table->foreign('ac_topic_id')->references('id')->on('ac_topics')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('type');
            $table->string('source');
            $table->text('artikel');
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
        Schema::dropIfExists('ac_contents');
    }
}
