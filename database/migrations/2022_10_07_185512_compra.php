<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Compra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('cantidad')->unsigned();
            $table->date('fecha');

            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')
                ->references('id')
                ->on('producto');

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
        //
    }
}
