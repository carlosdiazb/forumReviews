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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iduser');
            $table->foreignId('idreview');
            $table->text('text');
            $table->timestamps();
            
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idreview')->references('id')->on('review')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
};
