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
                $table->string('extra_informatie')->nullable();
                $table->boolean("beschikbaar")->default(TRUE);
                $table->string('email_oppasser')->nullable()->default(null);
                $table->foreign('huisdier_id')->references('huisdier_id')->on('huisdier')->onDelete('cascade');
                $table->foreign('email_oppasser')->references('email')->on('users')->onDelete('cascade');
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
        Schema::table('aanvraag', function (Blueprint $table) {
            $table->dropForeign('aanvraag_huisdier_id_foreign');
            $table->dropForeign('aanvraag_email_foreign');
        });
    
        Schema::dropIfExists('aanvraag');
    }
    
}
