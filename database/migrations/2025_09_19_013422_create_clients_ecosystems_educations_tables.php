<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();         // path gambar/logo
            $table->string('link', 255)->nullable();      // URL tujuan
            $table->timestamps();
        });

        Schema::create('ecosystems', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('link', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('link', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educations');
        Schema::dropIfExists('ecosystems');
        Schema::dropIfExists('clients');
    }
};
