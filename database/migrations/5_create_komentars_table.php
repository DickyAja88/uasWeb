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
        Schema::create('komentars', function (Blueprint $table) {
            $table->id("id_komentar");
            $table->string("komentar");
            $table->smallInteger("like");
            $table->smallInteger("dislike");
            $table->date("tanggal_komentar");
            $table->foreignId("id_user")->constrained(table:'users', column:'id_user', indexName:'user_comment');
            $table->foreignId("id_artikel")->constrained(table:'artikels', column:'id_artikel', indexName:'artikel_page');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
