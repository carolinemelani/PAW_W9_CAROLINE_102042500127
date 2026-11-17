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
            // Menambahkan kolom role dengan nilai default 'mahasiswa'
            $table->string('role')->default('mahasiswa'); 
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom role jika migrasi di-rollback
            $table->dropColumn('role');
        });
    }
};
