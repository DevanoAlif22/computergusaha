<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_website', 150);
            $table->string('logo')->nullable();           // path logo di storage (public)
            $table->string('header', 255)->nullable();    // judul/teks header atau path gambar header
            $table->string('slogan', 255)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('nomor', 50)->nullable();      // nomor telepon/WA
            $table->string('linkedin', 255)->nullable();  // url
            $table->string('instagram', 255)->nullable(); // url
            $table->text('footer_text')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturan');
    }
};
