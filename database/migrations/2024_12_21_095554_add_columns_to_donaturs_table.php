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
        Schema::table('donaturs', function (Blueprint $table) {
            $table->unsignedBigInteger('donasi_id')->nullable()->after('id'); // Menambahkan kolom donasi_id
            $table->decimal('amount', 15, 2)->nullable()->after('donasi_id'); // Menambahkan kolom amount

            // Relasi opsional (jika diperlukan)
            $table->foreign('donasi_id')->references('id')->on('donasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donaturs', function (Blueprint $table) {
            $table->dropForeign(['donasi_id']); // Hapus relasi jika ada
            $table->dropColumn(['donasi_id', 'amount']); // Hapus kolom
        });
    }
};
