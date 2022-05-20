<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('userid')->after('id');
            $table->string('username')->unique()->after('email');
            $table->string('phone')->unique()->after('username');
            $table->string('country')->after('phone');
            $table->string('description')->after('country');
            $table->string('profession')->after('description');
            $table->string('status')->default('0')->comment('1 for exist and 2 for suspended')->after('profession');
            $table->datetime('last_login_at')->format('Y/m/d H:i:s')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->softDeletes();
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
            //
        });
    }
}
