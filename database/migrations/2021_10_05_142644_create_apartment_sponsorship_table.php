<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentSponsorshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_sponsorship', function (Blueprint $table) {
            $table->id();
            // apartment column's id
            $table->unsignedBigInteger('apartment_id');
            $table->foreign('apartment_id')->references('id')->on('apartments');

            // visitor column's id 
            $table->unsignedBigInteger('sponsorship_id');
            $table->foreign('sponsorship_id')->references('id')->on('sponsorships')->index('sponsorship_id');
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
        Schema::dropIfExists('apartment_sponsorship');
    }
}
