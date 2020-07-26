<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('avatar');
            $table->string('fullname');
            $table->string('cpf')->unique();
            $table->string('cns')->unique();
            $table->date('birth');
            $table->char('gender', 1);
            $table->string('mothername');
            $table->string('fone');
            $table->string('email')->unique();
            $table->string('password');

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
        Schema::dropIfExists('pacients');
    }
}
