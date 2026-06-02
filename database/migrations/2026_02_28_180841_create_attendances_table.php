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
    Schema::create('attendances', function (Blueprint $table) {
        $table->id();
        // ID Siswa yang di-scan
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        // ID Guru yang melakukan scan
        $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
        $table->string('status')->default('hadir'); // hadir, izin, sakit, alpa
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
