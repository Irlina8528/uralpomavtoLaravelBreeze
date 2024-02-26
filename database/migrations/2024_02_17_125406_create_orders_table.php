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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_client');
            $table->string('city_from');
            $table->string('city_into');
            $table->boolean('liquid')->default(false);
            $table->boolean('fragile')->default(false);
            $table->boolean('loose')->default(false);
            $table->boolean('dangerous')->default(false);
            $table->string('declared_cost');
            $table->date('delivery_date');
            $table->boolean('pallet')->default(false);
            $table->boolean('protective_packaging')->default(false);
            $table->boolean('carton')->default(false);
            $table->string('cost');
            $table->unsignedBigInteger('id_driver')->nullable();
            $table->unsignedBigInteger('id_transport')->nullable();
            $table->unsignedBigInteger('id_status')->default('1');
            $table->unsignedBigInteger('id_manager')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
