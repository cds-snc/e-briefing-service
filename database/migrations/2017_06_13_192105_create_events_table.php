<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('day_id');
            $table->unsignedInteger('contact_id')->nullable();
            $table->string('title');
            $table->string('type')->nullable();
            $table->time('time_from');
            $table->time('time_to')->nullable();
            $table->string('location_name')->nullable();
            $table->string('location_address')->nullable();
            $table->string('location_postal')->nullable();
            $table->text('description')->nullable();
            $table->text('body')->nullable();
            $table->boolean('is_meal');
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
        Schema::dropIfExists('events');
    }
}
