<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAanvraagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('aanvraag')){
            Schema::create('aanvraag', function (Blueprint $table) {
                $table->bigIncrements('aanvraag_id');
                $table->bigInteger('huisdier_id')->unsigned();
                $table->string('wanneer');
                $table->string('prijs');
                $table->string('extra_informatie');
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
        Schema::table('aanvraag', function (Blueprint $table){
            $table->dropForeign('aanvraag_huisdier_id_foreign');
        });
    }
}
