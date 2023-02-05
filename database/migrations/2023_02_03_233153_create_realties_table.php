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
        Schema::create('realties', function (Blueprint $table) {
            $table->id();
            $table->float('price', 9,2);
            $table->enum('territory',['Αθήνα', 'Θεσσαλονίκη', 'Πάτρα', 'Ηράκλειο']);
            $table->enum('availability',['Ενοικίαση','Πώληση']);
            $table->integer('square');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realties');
    }
};
