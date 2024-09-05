<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTendangnhapNullInNguoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('NguoiDung', function (Blueprint $table) {
            $table->string('Email')->nullable()->change();
            $table->string('TenDangNhap')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('NguoiDung', function (Blueprint $table) {
            $table->string('Email')->nullable(false)->change();
            $table->string('TenDangNhap')->nullable(false)->change();
        });
    }
}
