<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_marketplaces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_variant_id')->constrained()->onDelete('cascade');
            $table->foreignId('connected_store_id')->constrained()->onDelete('cascade');
            $table->string('marketplace_product_id')->nullable();
            $table->string('marketplace_variant_id')->nullable();
            $table->string('sync_status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_marketplaces');
    }
};
