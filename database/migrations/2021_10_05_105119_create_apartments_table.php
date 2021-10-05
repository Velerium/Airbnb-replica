<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 63)->unique();
            $table->unsignedTinyInteger('rooms_n');
            $table->unsignedTinyInteger('beds_n');
            $table->unsignedTinyInteger('bathrooms_n');
            $table->unsignedTinyInteger('guests_n');
            $table->unsignedSmallInteger('square_meters');
            $table->text('summary');
            $table->string('address', 150);
            $table->float('latitude', 9,6);
            $table->float('longitude', 9,6);
            $table->decimal('price', 4,2);
            $table->boolean('visible'); 
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
        Schema::dropIfExists('apartments');
    }
}
