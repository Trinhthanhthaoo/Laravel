<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongTinNguoiDungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ThongTinNguoiDung', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDNguoiDung');
            $table->string('HoVaTen');
            $table->string('DanhXung')->nullable();
            $table->string('CongViec')->nullable();
            $table->string('CongTy')->nullable();
            $table->string('SoDienThoai')->nullable();
            $table->string('LinkFacebook')->nullable();
            $table->string('SoDienThoaiZalo')->nullable();
            $table->string('DiaChi')->nullable();
            $table->string('LinkLinkedIn')->nullable();
            $table->foreign('IDNguoiDung')->references('id')->on('NguoiDung')->onDelete('cascade');
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
        Schema::dropIfExists('ThongTinNguoiDung');
    }
}
