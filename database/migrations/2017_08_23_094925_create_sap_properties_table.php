<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSapPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sap_properties', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sap_id')->unsigned();
            $table->foreign('sap_id')->references('id')->on('saps');

            $table->string('title', 7);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('town');
            $table->string('county');
            $table->string('postcode');
            $table->string('email');
            $table->string('landline_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('property_type');
            $table->string('boiler_type');
            $table->string('scaffolding_access');
            $table->integer('year_built');
            $table->string('loft_access');
            $table->integer('electricity_spend');
            $table->integer('gas_spend');
            $table->integer('kw_usage');
            $table->integer('gas_saving');
            $table->string('energy_provider');

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
        Schema::dropIfExists('sap_properties');
    }
}
