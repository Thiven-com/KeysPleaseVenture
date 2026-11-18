<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('schedule_visit_enquiries', function (Blueprint $table) {
            $table->bigInteger('customer_id')
                ->nullable()
                ->after('property_id');
        });
    }

    public function down(): void
    {
        Schema::table('schedule_visit_enquiries', function (Blueprint $table) {
            $table->dropConstrainedForeignId('customer_id');
        });
    }
};