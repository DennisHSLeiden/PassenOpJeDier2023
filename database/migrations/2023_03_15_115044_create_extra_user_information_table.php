<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('extra_user_information')){
            Schema::create('extra_user_information', function (Blueprint $table) {
                $table->bigIncrements('user_id');
                $table->string('voornaam');
                $table->string('tussenvoegsel')->nullable();
                $table->string('achternaam');
                $table->string('telefoonnummer')->unique();
                $table->integer('leeftijd');
                $table->string('woonplaats');
                $table->string('straat');
                $table->string('huisnummer');
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
        Schema::table('extra_user_information', function (Blueprint $table){
            $table->dropForeign('extra_user_information_user_id_foreign');
        });
    }
}
