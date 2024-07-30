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
        Schema::table('destination', function (Blueprint $table) {
            $table->string('image')->after('name');
            $table->text('content')->after('description');
            $table->text('album')->after('content');
            $table->string('slug')->after('album');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destination', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('content');
            $table->dropColumn('album');
            $table->dropColumn('slug');
        });
    }
};
