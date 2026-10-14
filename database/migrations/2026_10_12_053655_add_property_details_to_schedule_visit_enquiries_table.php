<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schedule_visit_enquiries', function (Blueprint $table) {
            $table->foreignId('property_id')
                ->nullable()
                ->after('id')
                ->constrained('properties')
                ->nullOnDelete();

            $table->string('property_title')->nullable()->after('property_id');
        });
    }

    public function down(): void
    {
        Schema::table('schedule_visit_enquiries', function (Blueprint $table) {
            $table->dropForeign(['property_id']);
            $table->dropColumn(['property_id', 'property_title']);
        });
    }
};
