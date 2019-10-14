<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameProficiencyIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_tutors', function (Blueprint $table) {
            $table->renameColumn('proficiency_id', 'tutor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_tutors', function (Blueprint $table) {
            $table->renameColumn('tutor_id', 'proficiency_id' );
        });
    }
}
