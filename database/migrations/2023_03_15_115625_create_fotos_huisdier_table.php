<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosHuisdierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('fotos_huisdier')){
            Schema::create('fotos_huisdier', function (Blueprint $table) {
                $table->bigIncrements('foto_huisdier_id');
                $table->bigInteger('huisdier_id')->unsigned();
                $table->string('titel');
                $table->string('src');
                $table->string('alt');
                $table->text('beschrijving');
                $table->foreign('huisdier_id')->references('huisdier_id')->on('huisdier')->onDelete('cascade');
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
        Schema::table('fotos_huisdier', function (Blueprint $table){
            $table->dropForeign('fotos_huisdier_huisdier_id_foreign');
        });
    }
}
