<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectation_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cours_id");
            $table->unsignedBigInteger("students_id");
            $table->foreign('cours_id')->references("id")->on("cours");
            $table->foreign("students_id")->references("id")->on("students");
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
        Schema::dropIfExists('affectation_students');
    }
}
