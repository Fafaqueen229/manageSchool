<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationProfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectation_prof', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cours_id");
            $table->unsignedBigInteger("enseignants_id");
            $table->foreign('cours_id')->references("id")->on("cours");
            $table->foreign("enseignants_id")->references("id")->on("enseignants");
            $table->unique(['enseignants_id','cours_id']);
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
        Schema::dropIfExists('affectation_prof');
    }
}
