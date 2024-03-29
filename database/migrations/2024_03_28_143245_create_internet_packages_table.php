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
        Schema::create('internet_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name', 255);
            $table->boolean('service_isactive');
            $table->integer('service_price');
            $table->string('service_duration', 55);
            $table->integer('service_upload_bandwidth');
            $table->integer('service_download_bandthwidth');
            $table->string('service_limit_daily', 11);
            $table->string('service_limit_monthly', 11);
            $table->string('service_limit_scope', 11);
            $table->string('service_description', 255);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP(6)'));
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00.000000');
            $table->string('created_by', 255);
            $table->string('updated_by', 255);

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
        Schema::dropIfExists('internet_packages');
    }
};
