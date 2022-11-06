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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name_client');
            $table->dateTime('date');
            $table->string('time');
            $table->string('tempat');
            $table->integer('total_pembayaran');
            $table->enum('status_pembayaran', ['done', 'pending'])->default('pending');
            $table->string('jumlah_terbayar');
            $table->string('note');
            $table->string('gencode');
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
        Schema::dropIfExists('events');
    }
};
