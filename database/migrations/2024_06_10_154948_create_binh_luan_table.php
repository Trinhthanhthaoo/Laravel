<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BinhLuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDTaiLieu');
            $table->unsignedBigInteger('IDNguoiDung');
            $table->text('NoiDung');
            $table->timestamp('NgayTao')->useCurrent();
            $table->foreign('IDTaiLieu')->references('id')->on('TaiLieuCongDong')->onDelete('cascade');
            $table->foreign('IDNguoiDung')->references('id')->on('NguoiDung')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BinhLuan');
    }
}
