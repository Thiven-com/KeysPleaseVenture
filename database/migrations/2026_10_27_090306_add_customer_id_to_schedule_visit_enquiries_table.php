<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schedule_visit_enquiries', function (Blueprint $table) {
            $table->foreignId('customer_id')
                ->nullable()
                ->after('property_id')
                ->constrained('customers')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('schedule_visit_enquiries', function (Blueprint $table) {
            $table->dropConstrainedForeignId('customer_id');
        });
    }
};