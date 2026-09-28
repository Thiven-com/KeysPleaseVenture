<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rental_property_reports', function (Blueprint $table) {
            $table->id();

            $table->string('property');

            $table->string('reason', 100);

            $table->text('message')->nullable();

            $table->string('status', 30)->default('new');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rental_property_reports');
    }
};