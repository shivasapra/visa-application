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
            $table->string('email');
            $table->string('id_proof');
            $table->string('id_no');
            $table->string('license_no');
            $table->string('license');
            $table->string('photo');
            $table->string('location');
            $table->string('mobile');
            $table->string('address');
            $table->integer('postal_code');
            $table->integer('students')->default(0);
            $table->integer('contracts')->default(0);
            $table->integer('revenue')->default(0);
            $table->integer('commission')->default(0);
            $table->integer('active_c')->default(0);
            $table->integer('expired_c')->default(0);   //c=contracts
            $table->integer('about_to_expired_c')->default(0);
            $table->integer('added_c')->default(0);
            $table->integer('declined_c')->default(0);
            $table->string('interested')->default('no');
            $table->string('refused')->default('no');
            $table->string('proposal_sent')->default('no');
            $table->string('document_sent')->default('no');
            $table->string('agreement')->default('no');
            $table->string('certification')->default('no');
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
