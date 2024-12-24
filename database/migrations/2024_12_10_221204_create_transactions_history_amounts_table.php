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
        Schema::create('transactions_history_amounts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sender_fullname');
            $table->string('receiver_fullname');
            $table->string('sender_account_number');
            $table->string('receiver_account_number');
            $table->float('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions_history_amounts');
    }
};
