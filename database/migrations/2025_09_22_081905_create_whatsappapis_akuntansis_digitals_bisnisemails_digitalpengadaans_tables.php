<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('whatsappapis', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->string('gambar')->nullable();   // path file di storage
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('akuntansis', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('digitals', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('bisnisemails', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('digitalpengadaans', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digitalpengadaans');
        Schema::dropIfExists('bisnisemails');
        Schema::dropIfExists('digitals');
        Schema::dropIfExists('akuntansis');
        Schema::dropIfExists('whatsappapis');
    }
};
