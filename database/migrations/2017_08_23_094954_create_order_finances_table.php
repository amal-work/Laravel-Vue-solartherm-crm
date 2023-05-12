<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_finances', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');

            $table->string('finance_lender');
            $table->tinyInteger('finance_period');
            $table->decimal('finance_rate');

            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->char('gender', 1);
            $table->date('dob');
            $table->string('maiden_name');
            $table->string('marital_status');
            $table->string('nationality');
            $table->integer('dependants');
            $table->string('landline_phone');
            $table->string('mobile_phone');
            $table->string('email');
            $table->string('time_at_address');
            $table->string('house_name');
            $table->string('street');
            $table->string('town');
            $table->string('county');
            $table->string('postcode');
            $table->integer('property_value');
            $table->integer('annual_gross_income');
            $table->integer('outstanding_mortgage');
            $table->integer('monthly_mortgage');
            $table->string('employment_status');
            $table->text('previous_addresses');
            $table->integer('previous_addresses_time');
            $table->string('current_debts');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('sort_code');
            $table->integer('time_with_bank');
            $table->integer('loan_amount');
            $table->text('notes');

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
        Schema::dropIfExists('order_finances');
    }
}
