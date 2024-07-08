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
        Schema::create('hinh_anh', function (Blueprint $table) {
            $table->id();
            $table->string('sach_id')->nullable();
            $table->string('url');
            $table->timestamps();

            $table->foreign('sach_id')->references('id')->on('sach');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hinh_anh');
    }
};
