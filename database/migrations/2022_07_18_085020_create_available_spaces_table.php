<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_spaces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('space_type_id');
            $table->foreignId('user_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->boolean('status');
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('available_spaces');
    }
}
