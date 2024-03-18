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
        Schema::create('hire_payments', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->foreignId('hire_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->double('amount');
            $table->date('date_paid');
            $table->enum('mode_of_payment',['cash','mobile_money','bank','digital']);
            $table->string('transaction_id')->default("N/A");
            $table->enum('status',['pending','successful'])->default('pending');//for digital integtaion

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hire_payments');
    }
};
