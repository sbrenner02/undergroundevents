<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('name');
            $table->longText('description');
            $table->string('type');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->time('time');
            $table->integer('host_id');
            $table->string('host');
            $table->enum('status',['active','cancelled', 'postponed'])->default('active');
            $table->string('location');
            $table->string('address')->nullable();
            $table->string('price');
            $table->string('agelimit');
            $table->string('tickets')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('poster')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
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
    }
}
