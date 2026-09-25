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
    Schema::create('weights', function (Blueprint $table) {
        $table->id();
        $table->decimal('weight', 5, 2); // เก็บน้ำหนัก
        $table->date('recorded_date'); // วันที่บันทึก
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weights');
    }
};
