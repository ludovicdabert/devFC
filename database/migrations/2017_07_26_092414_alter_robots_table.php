<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRobotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('robots', function (Blueprint $table) {
            // champ slug 
           $table->string('slug', 100)->nullable()->after('name');
           $table->unsignedInteger('category_id')->nullable()->after('user_id');
           // la contrainte ajouter sur le champ category_id avec une option sur la suppression d'une catégorie onDelete
           // dans ce cas si on supprime une catégorie ayant des robots c'est possible et MySQL ajoutera pour toutes les valeurs
           // category_id la valeur NULL à la place de l'id categories qui n'existe plus, attention le champ category_id doit
           // avoir le type NULL 
           $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('robots', function (Blueprint $table) {
            // vous devez d'abord supprimer la contrainte avant le champ lui-même
            $table->dropForeign('robots_category_id_foreign'); // le nom de la contrainte qu'il faut supprimer
            $table->dropColumn('category_id');
            // supprimer le champ slug lors du rollback
            $table->dropColumn('slug');
        });
    }
}
