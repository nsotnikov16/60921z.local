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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_from_id');
            $table->foreign('user_from_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_to_id');
            $table->foreign('user_to_id')->references('id')->on('users');
            $table->text('content');
            $table->unsignedBigInteger('dialog_id');
            $table->foreign('dialog_id')->references('id')->on('dialogs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
