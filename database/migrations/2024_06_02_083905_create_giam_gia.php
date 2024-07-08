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
        Schema::create('giam_gia', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('sach_id');
            $table->integer('phan_tram');
            $table->timestamps();

            $table->foreign('sach_id')->references('id')->on('sach');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giam_gia');
    }
};
