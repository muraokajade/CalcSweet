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
         Schema::create('cakes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ingredient_id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ing_name');
            $table->string('name');
            $table->integer('amount');
            $table->integer('number');
            $table->double('raw_price',5,2);
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
        Schema::dropIfExists('cakes');
    }
};
