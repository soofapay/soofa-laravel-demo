<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQubeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qubeans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_status');
            $table->string('transaction_id');
            $table->string('receipt_number');
            $table->string('sender_currency');
            $table->string('reference');
            $table->integer('amount_paid');
            $table->integer('received_amount');
            $table->string('sender');
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
        Schema::dropIfExists('qubeans');
    }
}
