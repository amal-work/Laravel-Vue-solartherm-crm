<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHybridBoilerAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hybrid_boiler_assessments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lead_id')->unsigned();
            $table->foreign('lead_id')->references('id')->on('leads');

            $table->char('homeowner', 1);
            $table->char('under_65', 1);

            $table->string('boiler_fuel');
            $table->string('gas_spend');
            $table->string('boiler_type');
            $table->string('boiler_age');
            $table->string('boiler_location');
            $table->string('occupation');
            $table->string('partner');
            $table->string('partner_occupation');
            $table->char('household_income_over_20k', 1);

            $table->string('property_type');
            $table->string('property_occupants');
            $table->string('property_year_built');
            $table->char('property_loft_room', 1);
            $table->string('property_loft_room_built');
            $table->string('property_bedrooms');
            $table->char('property_loft_insulation', 1);
            $table->char('property_cavity_walls', 1);
            $table->char('property_extension', 1);
            $table->char('property_conservatory', 1);
            $table->char('property_has_solar', 1);
            $table->char('property_listed', 1);
            $table->char('property_conservation_area', 1);

            $table->char('building_work_planned', 1);
            $table->char('planning_to_move', 1);
            $table->char('bad_credit', 1);

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
        Schema::dropIfExists('hybrid_boiler_assessments');
    }
}
