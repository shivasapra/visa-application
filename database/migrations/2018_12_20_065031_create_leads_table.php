<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_id')->nullable();
            $table->integer('social_id')->nullable();
            $table->string('third_party')->nullable();
            $table->string('student_fname');
            $table->string('student_lname');
            $table->string('email')->nullable();
            $table->string('Mobile');
            $table->string('address')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('leads');
    }
}
