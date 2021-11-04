<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmpidAvatarLnameMnameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('emp_id')->unique();
            $table->string('avatar')->default('default.jpg');
            $table->string('lname');
            $table->string('mname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('emp_id');
            $table->dropColumn('avatar');
            $table->dropColumn('lname');
            $table->dropColumn('mname');
        });
    }
}
