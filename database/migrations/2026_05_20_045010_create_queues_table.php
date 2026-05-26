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
        Schema::create('queues', function (Blueprint $table) {

            $table->id();

            // Nomor antre
            $table->string('queue_number');

            // Nama customer
            $table->string('customer_name');

            // Nomor hp
            $table->string('phone')->nullable();

            // Jumlah orang
            $table->integer('total_people')->default(1);

            // Menu order
            $table->integer('latte')->default(0);

            $table->integer('americano')->default(0);

            $table->integer('cappuccino')->default(0);

            // Total harga
            $table->integer('total_price')->default(0);

            // Status antrean
            $table->string('status')->default('waiting');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};