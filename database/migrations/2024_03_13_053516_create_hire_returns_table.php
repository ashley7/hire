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
        Schema::create('hire_returns', function (Blueprint $table) {

            $table->id();
            $table->timestamps();

            $table->foreignId('hire_detail_id')->constrained();
            $table->date('date_returned');
            $table->text('description')->nullable();
            $table->string('file_url')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hire_returns');
    }
};
