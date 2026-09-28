<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('amenities', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('icon')->nullable()->after('name');
            $table->string('category')->nullable()->after('icon');
            $table->string('status')->default('active')->after('category');
            $table->unsignedInteger('sort_order')->default(0)->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('amenities', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'icon',
                'category',
                'status',
                'sort_order',
            ]);
        });
    }
};