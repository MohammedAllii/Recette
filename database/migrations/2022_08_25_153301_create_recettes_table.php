<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->id();
            $table->string('name_recette');
            $table->string('difficulté');
            $table->integer('preparation');
            $table->integer('cuisson');
            $table->text('ingrédiant');
            $table->text('description');
            $table->string('photo_recette')->default("recette.png");
            $table->string('categorie');
            $table->integer('état')->default(0);
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('recettes');
    }
}
