<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {

            $table->increments('id');
            $table->string('codigo', 20);
            $table->string('descripcion', 100);
            $table->string('origen', 20);
            $table->string('fabrica', 100);
            $table->decimal('utilidad', 10, 2);
            $table->decimal('precio_unitario', 10, 2);

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
