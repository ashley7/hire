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
        Schema::create('hires', function (Blueprint $table) {
            
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->date('date_placed');
            $table->enum('status',['pending','confirmed','declined'])->default('pending');
            $table->enum('delivery_method',['Pick-up','Deliver'])->default('Deliver');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hires');
    }
};
