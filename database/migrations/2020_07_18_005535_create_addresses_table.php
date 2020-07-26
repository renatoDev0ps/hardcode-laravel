<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zipcode');
            $table->string('publicplace');
            $table->string('complement');
            $table->string('neighborhood');
            $table->string('locality');
            $table->char('uf', 2);

            $table->unsignedInteger('pacient_id');
            $table->foreign('pacient_id')
                    ->references('id')
                    ->on('pacients');

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
        Schema::dropIfExists('addresses');
    }
}
