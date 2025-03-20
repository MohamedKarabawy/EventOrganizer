<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('eo_events', function (Blueprint $table) {
            $table->bigIncrements('id')->from(2423);
            $table->string('title');
            $table->string('description');
            $table->string('location');
            $table->timestamp('date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eo_events');
    }
};
