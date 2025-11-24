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
    Schema::create('procurements', function (Blueprint $table) {
        $table->id();

        // Siapa yang minta? (Bisa nama dosen/staff)
        $table->string('requestor_name'); 

        // Minta apa?
        $table->string('item_name'); 
        $table->enum('type', ['asset', 'consumable']); // Aset Tetap atau BHP?
        $table->integer('quantity'); // Berapa banyak?
        $table->text('description')->nullable(); // Spesifikasi/Alasan

        // Status Alur
        // Pending -> Diproses (Acc) -> Ditolak -> Selesai (Sudah beli & masuk gudang)
        $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');

        // Catatan Admin (Kenapa ditolak? atau Kapan estimasi beli?)
        $table->text('admin_note')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procurements');
    }
};
