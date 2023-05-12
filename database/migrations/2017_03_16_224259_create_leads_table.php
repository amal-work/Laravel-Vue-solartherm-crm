<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('source_id')->unsigned();
            $table->foreign('source_id')->references('id')->on('lead_sources');

            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->text('address')->nullable();
            $table->string('postcode')->nullable();

            $table->string('status')->default('new');
            $table->json('data')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
