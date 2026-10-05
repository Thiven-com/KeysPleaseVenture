<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('properties', function (Blueprint $table) {
        $table->foreignId('broker_id')
            ->nullable()
            ->after('user_id')
            ->constrained('brokers')
            ->nullOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('properties', function (Blueprint $table) {
        $table->dropForeign(['broker_id']);
        $table->dropColumn('broker_id');
    });
}
};
