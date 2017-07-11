<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_person', function (Blueprint $table) {
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('person_id');
            $table->boolean('is_contact')->default(0);
            $table->boolean('is_participant')->default(0);

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_person');
    }
}
