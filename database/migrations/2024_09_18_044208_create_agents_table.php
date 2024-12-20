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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index();
            $table->bigInteger('merchant_id')->index();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('business_name')->nullable()->index();
            $table->string('business_address')->nullable();
            $table->string('business_type')->nullable();
            
            $table->string('business_phone')->nullable()->index();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('local_government')->nullable();
            $table->string('city')->nullable();
            $table->string('bvn')->nullable()->unique();

            $table->string('agent_type')->default('AGENT');
            $table->string('identity_type')->nullable();
            $table->string('id_type_no')->nullable();
            $table->string('identity_url')->nullable();
            $table->string('status')->default('active');
            $table->string('terminal_id')->nullable()->index();
            $table->string('created_by')->nullable();

            $table->string('updated_by')->nullable();
            $table->string('transaction_pin')->nullable();
            $table->decimal('transaction_limit', 20,2)->nullable();
            $table->integer('commission_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
