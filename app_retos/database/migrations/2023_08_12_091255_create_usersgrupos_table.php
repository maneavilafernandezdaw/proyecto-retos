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
        Schema::create('usersgrupos', function (Blueprint $table) {
        /*     $table->integer('idgrupo');
            $table->integer('iduser'); */
            $table->foreignId('idgrupo')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreignId('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['idgrupo', 'iduser']);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersgrupos');
    }
};
