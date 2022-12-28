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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('token')->nullable();
            $table->string('status')->default('Wysłane potwierdzenie');
            $table->integer('rola')->default(1);
            $table->integer('id_firma');
            $table->integer('telefon')->nullable();
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
        Schema::dropIfExists('users');
    }
};
