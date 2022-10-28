<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Venta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('cantidad')->unsigned();
            $table->boolean('es_facturado')->default(false);
            $table->date('fecha');

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')
                ->references('id')
                ->on('cliente');

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
