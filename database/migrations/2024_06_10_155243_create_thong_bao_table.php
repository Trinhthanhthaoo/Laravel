<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongBaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ThongBao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDMentor')->nullable();
            $table->unsignedBigInteger('IDMentee')->nullable();
            $table->text('NoiDung');
            $table->timestamp('NgayTao')->useCurrent();
            $table->timestamp('NgayDoc')->useCurrent();
            $table->integer('LoaiThongBao')->nullable();
            $table->foreign('IDMentor')->references('id')->on('Mentor')->onDelete('set null');
            $table->foreign('IDMentee')->references('id')->on('Mentee')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ThongBao');
    }
}
