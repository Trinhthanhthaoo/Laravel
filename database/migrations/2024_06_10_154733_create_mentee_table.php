<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenteeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Mentee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDNguoiDung');
            $table->unsignedBigInteger('IDMentor')->nullable();
            $table->float('DiemGPA')->nullable();
            $table->text('NoiDung')->nullable();
            $table->foreign('IDNguoiDung')->references('id')->on('NguoiDung')->onDelete('cascade');
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
        Schema::dropIfExists('Mentee');
    }
}
