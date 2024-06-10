<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhSachMentorMenteeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DanhSachMentorMentee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDMentee');
            $table->unsignedBigInteger('IDMentor');
            $table->foreign('IDMentee')->references('id')->on('Mentee')->onDelete('cascade');
            $table->foreign('IDMentor')->references('id')->on('Mentor')->onDelete('cascade');
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
        Schema::dropIfExists('DanhSachMentorMentee');
    }
}
