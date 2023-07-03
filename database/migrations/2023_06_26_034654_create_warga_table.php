<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id('id_warga');
            $table->string('nama_lengkap');
            $table->string('nik', 16)->unique();
            $table->string('alamat', 100);
            $table->unsignedBigInteger('id_user')->unique();
            $table->enum('agama', ['0', '1', '2', '3', '4', '5']);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('id_pekerjaan')->unique();
            $table->enum('status_perkawinan', ['0', '1', '2']);
            $table->enum('status_kependudukan', ['0', '1']);
            $table->enum('kewarganegaraan', ['0', '1']);
            $table->string('nomor_telpon', 13);
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
        Schema::dropIfExists('warga');
    }
};
