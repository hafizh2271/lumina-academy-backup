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
    Schema::table('users', function (Blueprint $table) {
        // Tambahin kolom yang kurang di sini
        if (!Schema::hasColumn('users', 'nip')) $table->string('nip')->nullable()->after('email');
        if (!Schema::hasColumn('users', 'nisn')) $table->string('nisn')->nullable()->after('nip');
        if (!Schema::hasColumn('users', 'jabatan')) $table->string('jabatan')->nullable()->after('role');
        if (!Schema::hasColumn('users', 'kelas')) $table->string('kelas')->nullable()->after('jabatan');
        if (!Schema::hasColumn('users', 'photo')) $table->string('photo')->nullable();
    });
}

public function down(): void
{
    // Schema::table('users', function (Blueprint $table) {
    //     $table->dropColumn(['nip', 'nisn', 'jabatan', 'kelas', 'photo']);
    // });
}
};
