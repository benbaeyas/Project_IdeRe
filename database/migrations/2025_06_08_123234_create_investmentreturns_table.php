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
        Schema::create('investment_returns', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah_return', 15, 2);
            $table->date('tanggal_pembayaran');
            $table->foreignId('investment_id')->constrained('investments')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investmentreturns');
    }
};
