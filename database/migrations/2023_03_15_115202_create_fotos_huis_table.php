<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosHuisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('fotos_huis')){
            Schema::create('fotos_huis', function (Blueprint $table) {
                $table->bigIncrements('foto_huis_id');
                $table->bigInteger('user_id')->unsigned();
                $table->string('titel');
                $table->string('src');
                $table->string('alt');
                $table->text('beschrijving');
                $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fotos_huis', function (Blueprint $table){
            $table->dropForeign('fotos_huis_user_id_foreign');
        });
    }
}
