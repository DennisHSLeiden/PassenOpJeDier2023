<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('reactie')){
            Schema::create('reactie', function (Blueprint $table) {
                $table->bigIncrements('reactie_id');
                $table->string('email');
                $table->bigInteger('aanvraag_id')->unsigned();
                $table->text('comment');
                $table->boolean('antwoord')->default(false);
                $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
                $table->foreign('aanvraag_id')->references('aanvraag_id')->on('aanvraag')->onDelete('cascade');
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

        Schema::table('reactie', function(Blueprint $table){
            $table->dropForeign('reactie_user_id_foreign');
            $table->dropForeign('reactie_aanvraag_id_foreign');
        });
        // Schema::table('reactie', function (Blueprint $table){
        //     $table->dropForeign(['user_id']);
        //     $table->dropForeign(['huisdier_id']);
        //     $table->dropColumn(['user_id','huisdier_id']);
        // });
    }
}
