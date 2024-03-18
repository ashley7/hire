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
        Schema::create('hire_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('hire_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->date('from');
            $table->date('to');
            $table->string('quantity')->default(1);
            $table->double('discount')->nullable();
            $table->double('unit_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hire_details');
    }
};
