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
                $table->string('soort');
                $table->text('generieke_informatie');
                $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
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
