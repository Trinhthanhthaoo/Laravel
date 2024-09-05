<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoiTacTruongDaiHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DoiTacTruongDaiHoc', function (Blueprint $table) {
            $table->id();
            $table->string('Ten');
            $table->string('Email', 100);
            $table->string('ToChuc')->nullable();
            $table->text('GhiChu')->nullable();
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
        Schema::dropIfExists('DoiTacTruongDaiHoc');
    }
}
