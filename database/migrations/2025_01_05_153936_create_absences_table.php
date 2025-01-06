<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('id_employe');
            $table->foreign('id_employe')->references('id')->on('employes')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('type_abscence', ['Conge', 'Maladie', 'Conge Paye', 'Conge Non Paye']);
            $table->mediumText('justification')->nullable()->default('text');
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
        Schema::dropIfExists('absences');
    }
}
