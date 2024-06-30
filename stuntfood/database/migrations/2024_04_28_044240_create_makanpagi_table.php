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
        Schema::create('ModelMakanPagi', function (Blueprint $table) {
            $table->id();
            $table->string('paket');
            $table->string('nama_makanan');
            $table->decimal('protein');
            $table->decimal('karbohidrat');
            $table->decimal('lemak');
            $table->decimal('energi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ModelMakanPagi');
    }
};
