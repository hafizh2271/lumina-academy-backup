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
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->string('day');          // MON, TUE, WED, etc
        $table->string('subject');      // Nama Pelajaran
        $table->string('time');         // 08:00 - 10:00
        $table->string('room');         // LAB-A1
        $table->string('grade')->nullable(); // X, XI, XII
        $table->string('major')->nullable(); // IPA, IPS
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
