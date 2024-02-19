<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('id_client')->references('id')->on('users');
            $table->foreign('id_driver')->references('id')->on('drivers');
            $table->foreign('id_transport')->references('id')->on('transports');
            $table->foreign('id_status')->references('id')->on('statuses');
            $table->foreign('id_manager')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
