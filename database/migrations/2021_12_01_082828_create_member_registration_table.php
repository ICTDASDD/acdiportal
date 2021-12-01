<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_registration', function (Blueprint $table) {
            $table->id();
            $table->string("afsn");
            $table->string("code");
            $table->integer("votingPeriodID");
            $table->string("registeredBy");
            $table->datetime("registeredOn", $precision = 0);
            $table->string("brRegistered");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_registration');
    }
}
