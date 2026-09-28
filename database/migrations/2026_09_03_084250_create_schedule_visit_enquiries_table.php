<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedule_visit_enquiries', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('phone', 20);

            $table->date('visit_date');

            $table->time('visit_time');

            $table->string('property_type', 50);

            $table->string('monthly_rent', 50)->nullable();

            $table->text('message')->nullable();

            $table->string('status', 30)->default('new');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedule_visit_enquiries');
    }
};