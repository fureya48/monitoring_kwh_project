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
        Schema::create('device_managements', function (Blueprint $table) {
            $table->id('uuid')->primary();
            $table->uuid('device_id');
            $table->float('tegangan');
            $table->float('arus');
            $table->float('daya_aktif');
            $table->float('daya_reaktif');
            $table->float('daya_semu');
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
        Schema::dropIfExists('device_managements');
    }
};
