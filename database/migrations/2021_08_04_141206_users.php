<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uname');
            $table->string('pass');
            $table->string('mail')->unique();
            $table->string('mpno');
            $table->string('fname');
            $table->string('lname');
            $table->set('status',['active','passive','trash']); // kategori durumu aktif,pasif,çöpte
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
