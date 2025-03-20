<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('eo_rsvp', function (Blueprint $table) {
            $table->bigIncrements('id')->from(2423);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('eo_users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('eo_events')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['pending', 'declined', 'accepted']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eo_rsvp');
    }
};
