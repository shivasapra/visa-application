<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_id');
            $table->integer('percentage');
            $table->longText('description');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('signed')->default('no');
            $table->string('signed_fname')->nullable();
            $table->string('signed_lname')->nullable();
            $table->string('signed_email')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
