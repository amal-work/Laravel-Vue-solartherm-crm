<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHybridBoilerSapSystems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hybrid_boiler_sap_systems', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sap_id')->unsigned();
            $table->foreign('sap_id')->references('id')->on('saps');

            //Hybrid info
            $table->integer('gas_pipe_upgrad_22');
            $table->string('hybrid_boiler_type');
            $table->string('rhi_tariff');
                        
            $table->json('rooms');            

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
        //
        Schema::dropIfExists('hybrid_boiler_sap_systems');
    }
}
