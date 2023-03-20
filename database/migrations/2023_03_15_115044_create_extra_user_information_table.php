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
                $table->string('email');
                $table->string('voornaam');
                $table->string('tussenvoegsel')->nullable();
                $table->string('achternaam');
                $table->string('telefoonnummer')->unique();
                $table->date('geboortedatum');
                $table->string('woonplaats');
                $table->string('straat');
                $table->string('huisnummer');
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
        Schema::table('extra_user_information', function (Blueprint $table){
            $table->dropForeign('extra_user_information_user_id_foreign');
        });
    }
}
