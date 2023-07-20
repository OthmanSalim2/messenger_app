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
        // Here are the messages that transfer in conversation
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained('conversations')->cascadeOnDelete();
            // here determine who send the message
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            // what's the body
            $table->text('body');

            // here type of message
            $table->enum('type', ['text', 'attachment'])->default('text');

            //here for when added the message
            $table->timestamps();
            $table->softDeletes();
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
