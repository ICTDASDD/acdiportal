<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id('candidateID');
            $table->string('profilePicture')->default("default-avatar.png");
            $table->string('lastName');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('information1');
            $table->string('information2');
            $table->integer('candidateTypeID');
            $table->integer('votingPeriodID');
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
        Schema::dropIfExists('candidates');
    }
}
