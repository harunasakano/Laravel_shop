<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name', 100);
            $table->string('password',255);
            $table->string('mail',255);
            $table->string('adress');
            $table->integer('total');
            $table->dateTime('newDate');
            $table->integer('deleteFlg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_users');
    }
}
