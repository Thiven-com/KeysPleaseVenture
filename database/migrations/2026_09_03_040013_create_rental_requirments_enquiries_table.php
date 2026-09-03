<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rental_requirments_enquiries', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('phone', 20);
            $table->string('email');

            $table->string('property_type', 50);
            $table->string('budget', 50)->nullable();

            $table->date('move_in_date')->nullable();

            $table->string('furnishing', 50)->nullable();

            $table->string('preferred_contact', 20);

            $table->text('message')->nullable();

            $table->string('status')->default('new');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rental_requirments_enquiries');
    }
};