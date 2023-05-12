<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saps', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lead_id')->unsigned();
            $table->foreign('lead_id')->references('id')->on('leads');

            $table->dateTime('appointment_at');
            $table->dateTime('completed_at')->nullable();
            $table->string('product');
            $table->tinyInteger('sap_step')->default(0);
            $table->string('status');
            $table->string('notes')->nullable();

            $table->timestamps();
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
        Schema::dropIfExists('saps');
    }
}
