<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            $table->unsignedInteger('balconies')
                ->nullable()
                ->after('bathrooms');

            $table->unsignedInteger('floor_number')
                ->nullable()
                ->after('balconies');

            $table->unsignedInteger('total_floors')
                ->nullable()
                ->after('floor_number');

            $table->string('property_age')
                ->nullable()
                ->after('total_floors');

            $table->string('property_condition')
                ->nullable()
                ->after('property_age');

            $table->string('facing')
                ->nullable()
                ->after('property_condition');

            $table->double('road_width', 15, 3)
                ->nullable()
                ->after('facing');

            $table->string('car_parking')
                ->nullable()
                ->after('road_width');

            $table->string('possession_status')
                ->nullable()
                ->after('car_parking');

            $table->unsignedInteger('built_up_area')
                ->nullable()
                ->after('area_sqft');

            $table->unsignedInteger('carpet_area')
                ->nullable()
                ->after('built_up_area');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'balconies',
                'floor_number',
                'total_floors',
                'property_age',
                'property_condition',
                'facing',
                'road_width',
                'car_parking',
                'possession_status',
                'built_up_area',
                'carpet_area',
            ]);
        });
    }
};