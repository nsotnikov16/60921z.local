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
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['dialog_id']);
        });
        Schema::dropIfExists('dialogs');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('dialogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adv_id');
            $table->foreign('adv_id')->references('id')->on('ads');
            $table->timestamps();
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('dialog_id')->references('id')->on('dialogs')->onDelete('cascade');
        });
    }
};
