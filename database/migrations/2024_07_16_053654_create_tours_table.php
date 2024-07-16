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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('slug');
            $table->text('description');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destination')->onDelete('cascade');
            $table->integer('price');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('tour_categories')->onDelete('cascade');
            $table->text('album');
            $table->string('link');
            $table->tinyInteger('publish')->default(1);
            $table->text('service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
