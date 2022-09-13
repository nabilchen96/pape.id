<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKumpulTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kumpul_tugas', function (Blueprint $table) {
            $table->id();

            //pengumpul
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            //tugas
            $table->unsignedBigInteger('id_tugas');
            $table->foreign('id_tugas')->references('id')->on('tugas')->onDelete('cascade');

            //file
            $table->string('file_tugas');

            //status
            $table->string('status');

            //keterangan jika ditolak
            $table->text('keterangan_ditolak')->nullable();

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
        Schema::dropIfExists('kumpul_tugas');
    }
}
