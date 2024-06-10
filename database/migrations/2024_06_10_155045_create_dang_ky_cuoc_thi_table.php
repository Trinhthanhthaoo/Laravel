<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangKyCuocThiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DangKyCuocThi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDCuocThi');
            $table->unsignedBigInteger('IDMentee');
            $table->unsignedBigInteger('IDNguoiDung');
            $table->timestamp('NgayDangKy')->useCurrent();
            $table->foreign('IDCuocThi')->references('id')->on('CuocThi')->onDelete('cascade');
            $table->foreign('IDMentee')->references('id')->on('Mentee')->onDelete('cascade');
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
        Schema::dropIfExists('DangKyCuocThi');
    }
}
