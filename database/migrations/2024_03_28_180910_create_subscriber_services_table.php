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
        Schema::create('subscriber_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('service_table_name', 255);
            $table->string('service_id', 55);
            $table->string('service_name', 55);
            $table->boolean('service_isactive');
            $table->string('created_by', 255);
            $table->string('updated_by', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('expires_at')->nullable();

            $table->foreign('service_table_name')->references('service_table_name')->on('service_tables')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('subscribers_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriber_service');
    }
};
