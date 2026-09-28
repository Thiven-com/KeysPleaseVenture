<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('listing_for');
            $table->string('property_type');

            $table->string('locality');
            $table->text('address')->nullable();

            $table->string('bhk')->nullable();
            $table->unsignedInteger('area_sqft')->nullable();

            $table->decimal('price', 12, 2)->nullable();

            $table->string('furnishing')->nullable();

            $table->json('amenities')->nullable();

            $table->string('owner_name');
            $table->string('owner_phone');

            $table->string('status')
                ->default('pending');

            $table->text('admin_remark')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};