<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nas', function (Blueprint $table) {
            $table->id();
            $table->string('nasname', 55)->nullable(false);
            $table->string('shortname', 55)->nullable(false);
            $table->string('type', 55)->nullable();
            $table->string('ports', 255)->nullable();
            $table->string('secret', 55)->nullable(false);
            $table->string('server', 55)->nullable();
            $table->string('community', 55)->nullable();
            $table->string('description', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nas');
    }
};
