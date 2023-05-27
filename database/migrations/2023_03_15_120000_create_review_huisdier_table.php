<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewHuisdierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('review_huisdier')){
            Schema::create('review_huisdier', function (Blueprint $table) {
                $table->bigIncrements('review_huisdier_id');
                $table->bigInteger('aanvraag_id')->unsigned()->nullable();
                $table->string('email_van'); /**Deze persoon heeft de aanvraag geaccepteerd en mag nu een review achterlaten*/
                $table->bigInteger('huisdier_id')->unsigned(); /** Het huisdier waar de aanvraag voor gemaakt is */
                $table->string('review')->nullable()->default(null);;
                $table->unsignedTinyInteger('rating')->unsigned()->between(1, 5)->nullable()->default(null);
                $table->foreign('aanvraag_id')->references('aanvraag_id')->on('aanvraag')->onDelete('cascade');
                $table->foreign('huisdier_id')->references('huisdier_id')->on('huisdier')->onDelete('cascade');
                $table->foreign('email_van')->references('email')->on('users')->onDelete('cascade');
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
        Schema::table('review_huisdier', function (Blueprint $table) {
            $table->dropForeign(['huisdier_id']);
            $table->dropForeign(['email_van']);
        });
    
        Schema::dropIfExists('review_huisdier');
    }
}
