<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('title');
            $table->string('gender');
            $table->string('first_language');
            $table->string('DOB');
            $table->string('Mobile');
            $table->string('address');
            $table->integer('postal_code');
            $table->integer('agent_id')->nullable();
            $table->integer('social_id')->nullable();
            $table->integer('lead_id')->nullable();
            $table->integer('visa_approved')->default(0);
            $table->integer('visa_rejected')->default(0);
            $table->integer('visa_re_applied')->default(0);
            $table->string('passport_no');
            $table->string('passport_issue');
            $table->string('passport_expire');
            $table->string('passport_country');
            $table->integer('tenth_percentage');
            $table->integer('twelveth_percentage');
            $table->integer('tenth_year');
            $table->integer('twelveth_year');
            $table->string('tenth_board');
            $table->string('twelveth_board');
            $table->string('twelveth_stream');
            $table->string('test');
            $table->string('test_date');
            $table->string('test_remarks')->nullable();
            $table->string('test_score')->nullable();
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
        Schema::dropIfExists('student_profiles');
    }
}
