<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
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
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // category_id için foreign key tanımlaması
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // user_id için foreign key tanımlaması
            $table->string('unicode');
            $table->string('slug');
            $table->string('title');
            $table->text('description');
            $table->integer('order'); //değiştirebilirim ödevde ürün sırası derken sıralama mı yapılmalı yoksa sıra için numara mı yazılmalı anlamadım
            $table->set('status',['active','passive','trash']); // ürün durumu aktif,pasif,çöpte
            $table->decimal('prc',19,2); //fiyat
            $table->integer('cid'); ///ürün kur bilgisi ( 1 : TL , 2 : Dolar , 3 : Euro)
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
