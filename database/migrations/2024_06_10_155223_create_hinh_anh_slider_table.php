<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHinhAnhSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HinhAnhSlider', function (Blueprint $table) {
            $table->id();
            $table->string('TieuDe')->nullable();
            $table->text('MoTa')->nullable();
            $table->string('URLHinhAnh');
            $table->integer('ThuTu');
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
        Schema::dropIfExists('HinhAnhSlider');
    }
}
