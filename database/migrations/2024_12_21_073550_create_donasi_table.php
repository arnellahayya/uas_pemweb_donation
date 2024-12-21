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
        Schema::create('donasi', function (Blueprint $table) {
            $table->id(); // Primary key ID
            $table->string('title'); // Judul donasi
            $table->text('description')->nullable(); // Deskripsi donasi (opsional)
            $table->decimal('target_amount', 15, 2); // Target donasi
            $table->decimal('amount_collected', 15, 2)->default(0); // Jumlah terkumpul
            $table->enum('category', ['Banjir', 'Gempa', 'Lainnya'])->default('Lainnya'); // Kategori donasi
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi');
    }
};
