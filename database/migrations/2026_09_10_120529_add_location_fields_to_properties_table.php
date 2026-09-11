<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            $table->string('country')
                ->nullable()
                ->after('property_type');

            $table->string('state')
                ->nullable()
                ->after('country');

            $table->string('district')
                ->nullable()
                ->after('state');

            $table->string('city')
                ->nullable()
                ->after('district');

            $table->string('pincode', 10)
                ->nullable()
                ->after('locality');

            $table->string('landmark')
                ->nullable()
                ->after('pincode');

            $table->string('google_map_url')
                ->nullable()
                ->after('landmark');

            $table->decimal('latitude', 10, 7)
                ->nullable()
                ->after('google_map_url');

            $table->decimal('longitude', 10, 7)
                ->nullable()
                ->after('latitude');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            $table->dropColumn([
                'country',
                'state',
                'district',
                'city',
                'pincode',
                'landmark',
                'google_map_url',
                'latitude',
                'longitude',
            ]);

        });
    }
};