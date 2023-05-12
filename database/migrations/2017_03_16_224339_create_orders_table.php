<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lead_id')->unsigned();
            $table->foreign('lead_id')->references('id')->on('leads');

            $table->integer('sap_id')->unsigned();
            $table->foreign('sap_id')->references('id')->on('saps');

            $table->string('payment_method')->nullable();
            $table->integer('deposit')->default(100);

            $table->dateTime('finance_completed_at')->nullable();

            $table->string('customer_signature')->nullable();
            $table->string('customer_signed_ip')->nullable();
            $table->dateTime('customer_signed_at')->nullable();

            $table->string('assessor_signature')->nullable();
            $table->string('assessor_signed_ip')->nullable();
            $table->dateTime('assessor_signed_at')->nullable();

            $table->dateTime('completed_at')->nullable();
            $table->dateTime('signed_at')->nullable();

            $table->string('status');
            $table->text('notes')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
