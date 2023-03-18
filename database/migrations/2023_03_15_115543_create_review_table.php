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
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('huisdier_id')->unsigned();
                $table->text('review');
                $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
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
