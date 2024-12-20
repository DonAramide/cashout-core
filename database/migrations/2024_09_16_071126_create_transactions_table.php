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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('agent_id')->nullable()->index();
            $table->bigInteger('merchant_id')->nullable()->index();
            $table->string('reference')->nullable()->index();
            $table->decimal('amount', 20,2)->nullable();
            $table->decimal('net_amount', 20,2)->nullable();
            $table->decimal('charge', 20,2)->nullable();
            $table->string('provider')->nullable()->index();
            $table->string('terminal_id')->nullable()->index();
            $table->string('status')->nullable()->index();
            $table->string('provider_status')->nullable();
            $table->string('provider_reference')->nullable();
            $table->string('pan')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_bank_issuer')->nullable();
            $table->decimal('channel_fee', 20, 2)->nullable();
            $table->decimal('commission', 20,2)->nullable();
            $table->string('stan')->nullable();
            $table->string('rrn')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->string('customer_reference')->nullable();
            $table->string('ip')->nullable();
            $table->string('channel_terminal_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
