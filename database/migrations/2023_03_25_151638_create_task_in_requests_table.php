<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_in_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_id');
            $table->bigInteger('request_id');
            $table->string('status');
            $table->timestamps();
        });
    }
 //TODO Dodanie zapisywania taskow poprzez tworzenie nowego formularza
    //TODO mechanizm zmiany statusu
    //TODO wyswietlania na bazie relacji w panelu technika
    //TODOgu in future zakladka dla technika z jego zadaniami do wykonania (Przypisanie zadan do technika dodatkowo)
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_in_requests');
    }
};
