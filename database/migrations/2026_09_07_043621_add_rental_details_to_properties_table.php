<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('property_title')->after('listing_for');
            $table->decimal('security_deposit', 12, 2)
                ->nullable()
                ->after('price');
            $table->unsignedInteger('bathrooms')
                ->nullable()
                ->after('bhk');
            $table->date('available_from')
                ->nullable()
                ->after('furnishing');
            $table->text('description')
                ->nullable()
                ->after('available_from');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'property_title',
                'security_deposit',
                'bathrooms',
                'available_from',
                'description',
            ]);
        });
    }
};