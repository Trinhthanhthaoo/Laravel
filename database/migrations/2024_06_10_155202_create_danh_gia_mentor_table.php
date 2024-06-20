<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGiaMentorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DanhGiaMentor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDMentee');
            $table->unsignedBigInteger('IDMentor');
            $table->float('Diem');
            $table->text('BinhLuan')->nullable();
            $table->timestamp('NgayDanhGia')->useCurrent();
            $table->foreign('IDMentee')->references('id')->on('Mentee')->onDelete('cascade');
            $table->foreign('IDMentor')->references('id')->on('Mentor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DanhGiaMentor');
    }
}
