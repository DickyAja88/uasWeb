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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id("id_artikel");
            $table->string("judul", 90)->index();
            $table->string("gambar", 90);
            $table->text("konten");
            $table->date("tanggal");
            $table->foreignId("id_topik")->constrained(table:'topiks', column:'id_topik', indexName:'id_topik_artikel');
            $table->foreignId("id_user")->constrained(table:'users', column:'id_user', indexName:'id_user_login');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
