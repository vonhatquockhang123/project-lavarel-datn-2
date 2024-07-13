<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGioHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gio_hang', function (Blueprint $table) {
            $table->id(); 
            $table->string('sach_id')->nullable();
            $table->string('combo_id')->nullable();
            $table->string('user_id')->nullable();
            $table->integer('so_luong_ton');
            $table->integer('gia');
            $table->integer('so_luong');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gio_hang');
    }
}
