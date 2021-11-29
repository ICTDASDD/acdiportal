<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateLimitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('candidate_limits', function (Blueprint $table) {
            $table->id('candidateLimitID');
            $table->integer('votingPeriodID');
            $table->integer('candidateTypeID');
            $table->integer('candidateLimitCount');
            $table->integer('memberVotingLimitCount');
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
        //
        Schema::dropIfExists('candidate_limits');
    }
}
