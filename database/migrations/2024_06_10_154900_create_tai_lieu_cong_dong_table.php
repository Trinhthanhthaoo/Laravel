<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaiLieuCongDongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TaiLieuCongDong', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDMentor')->nullable();
            $table->unsignedBigInteger('IDMentee')->nullable();
            $table->string('TieuDe');
            $table->text('NoiDung');
            $table->enum('TrangThai', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('NgayTao')->useCurrent();
            $table->foreign('IDMentor')->references('id')->on('Mentor')->onDelete('set null');
            $table->foreign('IDMentee')->references('id')->on('Mentee')->onDelete('set null');
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
        Schema::dropIfExists('TaiLieuCongDong');
    }
}
