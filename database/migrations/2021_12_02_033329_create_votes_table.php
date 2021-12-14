<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amendment_votes', function (Blueprint $table) {
            $table->id();
            $table->integer('mrID');
            $table->integer('aID');
            $table->integer('vpID');
            $table->integer('vote');
            $table->timestamps();
        });

        Schema::create('candidate_votes', function (Blueprint $table) {
            $table->id();
            $table->integer('mrID');
            $table->integer('cID');
            $table->integer('vpID');
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
        Schema::dropIfExists('amendment_votes');
        Schema::dropIfExists('candidate_votes');
    }
}
