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
        // this's for the users they receive the message
        Schema::create('recipients', function (Blueprint $table) {
            // the users that use this message of received
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // the message of user and is it used or no
            $table->foreignId('message_id')
                ->constrained('messages')
                ->cascadeOnDelete();

            // here is user read the message or no
            $table->timestamp('read_at')->nullable();

            // here is user delete the message or no
            $table->softDeletes();

            $table->primary(['user_id', 'message_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipients');
    }
};
