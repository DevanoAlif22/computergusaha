<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_category_id')
                ->constrained('faq_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade'); // cegah hapus kategori jika masih ada FAQ
            $table->string('pertanyaan', 255);
            $table->longText('jawaban')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
