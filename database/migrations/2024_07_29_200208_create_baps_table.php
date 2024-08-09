<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBapsTable extends Migration
{
    public function up()
    {
        Schema::create('baps', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->unique();
            $table->date('tanggal');
            $table->string('nama');
            $table->string('jabatan');
            $table->text('alamat');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->text('rincian_barang');
            $table->integer('kuantitas');
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('ongkos_kirim', 15, 2)->nullable();
            $table->decimal('total', 15, 2);
            $table->string('untuk_atas_nama');
            $table->string('nip');
            $table->foreignId('status_id')->default(1);
            $table->timestamp('finish_date')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('baps');
    }
}
