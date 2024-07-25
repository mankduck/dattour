<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('total_chil')->default(0);
            $table->integer('total_adult');
            $table->integer('total');
            $table->integer('discount')->nullable();
            $table->unsignedBigInteger('booking_id');
            $table->integer('status')->default(1);
            $table->string('description')->nullable();
            $table->dateTime('deposited_at')->nullable();
            $table->dateTime('payed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
