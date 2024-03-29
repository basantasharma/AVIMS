<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('iptv_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name', 255);
            $table->boolean('service_isactive');
            $table->string('service_price', 55);
            $table->string('service_duration', 55);
            $table->integer('no_of_HD_channels');
            $table->integer('no_of_SD_channels');
            $table->string('service_description', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00.000000');
            $table->string('created_by', 55);
            $table->string('updated_by', 55);
            $table->unique('service_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iptv_packages');
    }
};
