<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuisdierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('huisdier')){
            Schema::create('huisdier', function (Blueprint $table) {
                $table->bigIncrements('huisdier_id');
                $table->string('email');
                $table->string('naam');
                $table->bigInteger('soort_id')->unsigned();
                $table->string('generieke_informatie')->nullable();
                $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
                $table->foreign('soort_id')->references('soort_id')->on('soorten')->onDelete('cascade');
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
        Schema::table('huisdier', function (Blueprint $table){
            $table->dropForeign('huisdier_user_id_foreign');
        });
    }
}
