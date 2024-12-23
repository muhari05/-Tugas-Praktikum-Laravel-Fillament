<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->string('jurusan');
            $table->enum('fakultas', ['FTIK', 'Teknik', 'Hukum', 'Ekonomi']);
            $table->enum('jenis_kelamin', ['L', 'P']);
             // Menambahkan kolom kode_makul sebagai foreign key
            $table->unsignedBigInteger('kode_makul')->nullable();
            $table->foreign('kode_makul')->references('id')->on('makuls')->onDelete('cascade');
             
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
         Schema::table('mahasiswas', function (Blueprint $table) {
             // Hapus foreign key sebelum menghapus tabel
             $table->dropForeign(['kode_makul']);
         });
 
        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
}
