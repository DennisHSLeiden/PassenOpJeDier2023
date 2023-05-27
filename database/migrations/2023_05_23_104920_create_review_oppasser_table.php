<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewOppasserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('review_oppasser')){
            Schema::create('review_oppasser', function (Blueprint $table) {
                $table->bigIncrements('review_oppasser_id');
                $table->bigInteger('aanvraag_id')->unsigned()->nullable();
                $table->string('email_van'); /**Deze persoon had de aanvraag geplaatst en mag nu een review plaatsen*/
                $table->string('email_voor'); /**Dit is de oppasser die de aanvraag had gekregen */
                $table->string('review')->nullable()->default(null);
                $table->unsignedTinyInteger('rating')->unsigned()->between(1, 5)->nullable()->default(null);
                $table->foreign('aanvraag_id')->references('aanvraag_id')->on('aanvraag')->onDelete('cascade');
                $table->foreign('email_van')->references('email')->on('users')->onDelete('cascade');
                $table->foreign('email_voor')->references('email')->on('users')->onDelete('cascade');
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
        Schema::table('review_oppasser', function (Blueprint $table) {
            $table->dropForeign(['email_van']);
            $table->dropForeign(['email_voor']);
        });
    
        Schema::dropIfExists('review_oppasser');
    }
    
}
