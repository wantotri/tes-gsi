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
        Schema::create('master_planning', function (Blueprint $table) {
            $table->string('kode', 4);
            $table->foreign('kode')
                  ->references('kode')
                  ->on('master_item');
            $table->integer('qty_target');
            $table->decimal('waktu_target');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_planning');
    }
};
