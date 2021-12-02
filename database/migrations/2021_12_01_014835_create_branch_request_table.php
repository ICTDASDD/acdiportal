<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_request', function (Blueprint $table) {
            $table->id();
            $table->string('brCode');
            $table->string('user_id');
            $table->string('request_type');
            $table->string('request_info');
            $table->integer('status')->default(0);
            $table->integer('elecom_status')->default(0);
            $table->integer('canvas_status')->default(0); 
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
        Schema::dropIfExists('branch_request');
    }
}
