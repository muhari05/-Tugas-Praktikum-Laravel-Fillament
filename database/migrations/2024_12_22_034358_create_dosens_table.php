<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('dosens', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nidn')->unique();
        $table->string('email');
        $table->unsignedBigInteger('kode_makul'); // Foreign key ke tabel makul
        $table->foreign('kode_makul')->references('id')->on('makul')->onDelete('cascade');
        $table->timestamps();
    });

}


public function up()
{
    Schema::table('dosens', function (Blueprint $table) {
        $table->unsignedBigInteger('kode_makul')->nullable()->after('nidn');
        $table->foreign('kode_makul')->references('id')->on('makul')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('dosens', function (Blueprint $table) {
        $table->dropForeign(['kode_makul']);
        $table->dropColumn('kode_makul');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosens');
    }
}
