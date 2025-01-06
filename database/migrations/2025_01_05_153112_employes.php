<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('birth_date');
            $table->date('start_working');
            $table->string('depart');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('role')->default('employe');
            $table->UnsignedBigInteger('id_supervisor')->nullable(); // Make supervisor nullable
            $table->UnsignedBigInteger('id_poste');
            $table->foreign('id_poste')->references('id')->on('postes')->onDelete('cascade')->onUpdate('cascade');
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
