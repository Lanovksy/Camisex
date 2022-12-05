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
        Schema::create('condoms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->double('quantity');
            $table->string('description');
            $table->string('file');
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condoms');
    }
};
