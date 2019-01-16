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
            $table->string('third_party')->nullable();
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
            $table->string('test')->nullable();
            $table->string('listening')->nullable();
            $table->string('reading')->nullable();
            $table->string('writing')->nullable();
            $table->string('speaking')->nullable();
            $table->string('test_date')->nullable();
            $table->string('test_remarks')->nullable();
            $table->string('test_score')->nullable();
            $table->string('tuition_fee')->nullable();
            $table->string('LOA')->default('no');
            $table->string('Loa_date')->nullable();
            $table->string('file_processing')->default('no');
            $table->string('file_processed')->default('no');
            $table->string('file_submission')->default('no');
            $table->string('submission_date')->nullable();
            $table->string('file_approved')->default('no');
            $table->string('approved_date')->nullable();
            $table->string('file_declined')->default('no');
            $table->string('declined_date')->nullable();
            $table->string('reapply')->default('no');
            $table->string('refund')->default('no');
            $table->string('refund_date')->nullable();
            $table->string('st_ins_1')->nullable();
            $table->string('st_ins_2')->nullable();
            $table->string('st_ins_3')->nullable();
            $table->string('st_ins_date')->nullable();
            $table->string('nd_ins_1')->nullable();
            $table->string('nd_ins_2')->nullable();
            $table->string('nd_ins_3')->nullable();
            $table->string('nd_ins_date')->nullable();
            $table->string('rd_ins_1')->nullable();
            $table->string('rd_ins_2')->nullable();
            $table->string('rd_ins_3')->nullable();
            $table->string('rd_ins_date')->nullable();
            $table->string('application_fee')->nullable();
            $table->string('document_received')->default('no');
            $table->string('document_received_date')->nullable();
            $table->string('offer_letter')->default('no');
            $table->string('offer_letter_date')->nullable();
            $table->string('intake_session')->nullable();
            $table->string('submission_to_visa')->default('no');
            $table->string('submission_to_visa_date')->nullable();
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
