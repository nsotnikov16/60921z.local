<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adv_message', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('adv_id');
            $table->foreign('adv_id')->references('id')->on('ads');
            $table->unsignedBigInteger('message_id');
            $table->foreign('message_id')->references('id')->on('messages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adv_message');
    }
};
