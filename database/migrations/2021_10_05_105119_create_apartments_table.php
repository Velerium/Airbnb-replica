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
            $table->string('title', 65)->unique()->index();
            $table->unsignedTinyInteger('rooms_n');
            $table->unsignedTinyInteger('beds_n');
            $table->unsignedTinyInteger('bathrooms_n');
            $table->unsignedTinyInteger('guests_n');
            $table->unsignedSmallInteger('square_meters');
            $table->text('summary');
            $table->text('cover')->nullable();
            $table->string('address', 150);
            $table->float('latitude', 7,4);
            $table->float('longitude', 7,4);
            $table->decimal('price', 8,2);
            $table->boolean('visible');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); 
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
