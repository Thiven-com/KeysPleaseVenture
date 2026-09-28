<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brokers', function (Blueprint $table) {

            $table->string('agency_name')->nullable()->after('mobile');

            $table->string('broker_type')->nullable()->after('agency_name');

            $table->string('license_number')->nullable()->after('broker_type');

            $table->text('address')->nullable()->after('license_number');

            $table->string('city')->nullable()->after('address');

            $table->string('state')->nullable()->after('city');

            $table->string('pincode')->nullable()->after('state');

            $table->string('status')
                ->default('pending')
                ->after('pincode');

            $table->text('rejection_reason')
                ->nullable()
                ->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('brokers', function (Blueprint $table) {

            $table->dropColumn([
                'agency_name',
                'broker_type',
                'license_number',
                'address',
                'city',
                'state',
                'pincode',
                'status',
                'rejection_reason',
            ]);

        });
    }
};