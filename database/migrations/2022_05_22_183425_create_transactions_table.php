<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('transaction_id');
            $table->string('purpose');
            $table->string('mode_of_payment');
            $table->unsignedInteger('amount');
            $table->datetime('transacted_at')->format('Y/m/d H:i:s');
            $table->string('status')->comment('1 for initiated,2 for completed,3 for failed,4 for cancelled,5 for reversed');
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
}
