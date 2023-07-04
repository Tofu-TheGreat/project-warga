<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama_lengkap');
            $table->string('nik', 16)->unique();
            $table->string('alamat', 100);
            $table->string('nomor')->nullable();
            $table->enum('agama', ['0', '1', '2', '3', '4', '5']);
            $table->date('tanggal_lahir');
            $table->string('foto')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->unsignedInteger('id_pekerjaan')->nullable();
            $table->enum('status_perkawinan', ['0', '1', '2']);
            $table->enum('status_kependudukan', ['0', '1']);
            $table->enum('peran', ['rw', 'rt'])->nullable();
            $table->enum('kewarganegaraan', ['0', '1']);
            $table->string('nomor_telpon', 13)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
