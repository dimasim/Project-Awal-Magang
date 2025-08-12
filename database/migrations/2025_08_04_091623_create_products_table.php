<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id'); // Buat kolomnya dulu
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('stock');
            $table->string('photo')->nullable();
            $table->timestamps();

            // Definisikan relasinya secara manual
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
