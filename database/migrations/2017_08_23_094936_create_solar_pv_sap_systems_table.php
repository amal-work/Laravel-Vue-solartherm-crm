<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolarPvSapSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solar_pv_sap_systems', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sap_id')->unsigned();
            $table->foreign('sap_id')->references('id')->on('saps');

            $table->integer('system_cost');
            $table->integer('battery_usage')->nullable();
            $table->integer('solar_usage_percentage');

            // Products
            $table->char('battery', 1);
            $table->char('chop_cloc', 1);
            $table->json('panels');
            $table->string('inverter_type');
            $table->integer('aframes');
            $table->char('voltage_optimiser', 1)->default('n');
            $table->char('monitoring_device', 1)->default('n');
            $table->char('hot_water_controller', 1)->default('n');
            $table->char('black_framed_panels', 1)->default('n');

            $table->decimal('government_fit_rate');
            $table->decimal('electricity_export_rate');
            $table->decimal('electricity_rate');
            $table->decimal('annual_system_output');

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
        Schema::dropIfExists('solar_pv_sap_systems');
    }
}
