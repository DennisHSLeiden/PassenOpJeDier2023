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
                $table->bigIncrements('extra_user_information_id');
                $table->string('email');
                $table->string('voornaam')->nullable()->default(null);
                $table->string('tussenvoegsel')->nullable()->default(null);
                $table->string('achternaam')->nullable()->default(null);
                $table->date('geboortedatum')->nullable()->default(null);
                $table->string('path')->nullable()->default(null);
                $table->string('filename')->nullable()->default(null);
                $table->string('telefoonnummer')->unique()->nullable()->default(null);
                $table->string('woonplaats')->nullable()->default(null);
                $table->string('straat')->nullable()->default(null);
                $table->string('huisnummer')->nullable()->default(null);
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
