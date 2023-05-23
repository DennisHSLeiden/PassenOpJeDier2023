<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('review')){
            Schema::create('review', function (Blueprint $table) {
                $table->bigIncrements('review_id');
                $table->string('email');
                $table->bigInteger('huisdier_id')->unsigned();
                $table->string('review');
                $table->unsignedTinyInteger('rating')->unsigned()->between(1, 5);
                $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
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
        Schema::table('review', function (Blueprint $table){
            $table->dropForeign('review_user_id_foreign');
            $table->dropForeign('review_huisdier_id_foreign');
        });
    }
}
