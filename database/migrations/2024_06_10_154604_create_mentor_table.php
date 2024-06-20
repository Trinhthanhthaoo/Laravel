<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Mentor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDNguoiDung');
            $table->string('ChuyenMon')->nullable();
            $table->string('ToChuc')->nullable();
            $table->string('BietVkuMentorQua')->nullable();
            $table->text('CauHoiGopY')->nullable();
            $table->text('ThanhTuu')->nullable();
            $table->string('Khoa')->nullable();
            $table->string('Nganh')->nullable();
            $table->string('Mon')->nullable();
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
        Schema::dropIfExists('Mentor');
    }
}
