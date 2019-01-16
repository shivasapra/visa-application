<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('company');
            $table->string('email');
            $table->string('percentage')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('photos_received')->default('no');
            $table->string('license')->nullable();
            $table->string('photo')->nullable();
            $table->string('location');
            $table->string('designation');
            $table->string('website');
            $table->string('state');
            $table->string('district');
            
            $table->string('reference1_name')->nullable();
            $table->string('reference1_phone')->nullable();
            $table->string('reference1_email')->nullable();
            $table->string('reference1_contact')->nullable();
            $table->string('reference1_website')->nullable();

            $table->string('reference2_name')->nullable();
            $table->string('reference2_phone')->nullable();
            $table->string('reference2_email')->nullable();
            $table->string('reference2_contact')->nullable();
            $table->string('reference2_website')->nullable();
            
            $table->string('mobile');
            $table->string('address');
            $table->integer('postal_code');
            $table->integer('students')->default(0);
            $table->integer('contracts')->default(0);
            $table->integer('revenue')->default(0);
            $table->integer('commission')->default(0);
            $table->integer('active_c')->default(0);
            $table->integer('expired_c')->default(0);
            $table->integer('signed_c')->default(0);   //c=contracts
            
            $table->integer('declined_c')->default(0);
            $table->string('interested')->default('no');

            $table->string('proposal_sent')->default('no');
            $table->string('document_received')->default('no');

            $table->string('certificate_issued')->default('no');
            $table->string('certificate_issued_date')->nullable();

            $table->string('agreement_sent')->default('no');
            $table->string('agreement_sent_date')->nullable();

            $table->string('agreement_signed_agent')->default('no');
            $table->string('agreement_signed_agent_date')->nullable();

            $table->string('agreement_signed_college')->default('no');
            $table->string('agreement_signed_college_date')->nullable();

            
            $table->integer('total_files')->default(0);
            $table->integer('files_not_started')->default(0);
            $table->integer('files_in_process')->default(0);
            $table->integer('files_in_hold')->default(0);
            $table->integer('files_canceled')->default(0);
            $table->integer('files_finished')->default(0);
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
        Schema::dropIfExists('agent_profiles');
    }
}
