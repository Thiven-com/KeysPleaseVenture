<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('furnishing_features', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->enum('furnishing_type', [
                'Fully Furnished',
                'Semi Furnished'
            ]);

            $table->enum('selection_type', [
                'checkbox',
                'quantity'
            ])->default('checkbox');

            $table->string('icon')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('furnishing_features');
    }
};
