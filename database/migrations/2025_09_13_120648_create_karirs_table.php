<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('karirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            // pilih salah satu: string biasa, atau enum.
            $table->enum('jenis', [
                'full_time','part_time','contract','internship','freelance',
                'temporary','remote','hybrid','volunteer'
            ])->index(); // kalau mau string biasa: $table->string('jenis');
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karirs');
    }
};
