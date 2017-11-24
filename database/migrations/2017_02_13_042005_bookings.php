<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bookings', function(Blueprint $table){
            $table->increments('id');
            $table->string('pembooking');

            $table->integer('tempat_id')->unsigned();
            $table->foreign('tempat_id')->references('id')->on('tempats');

            $table->integer('package_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages');

            $table->string('tgl_acara');
            $table->string('status');
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
        Schema::dropIfExists('bookings');
    }
}
