<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            
                        $table->increments('id');
                        $table->unsignedInteger('Userid');
                        $table->string('itemCode',255);
                        $table->integer('type');
                        $table->dateTime('buyDate');
                        $table->timestamps();

                        //外部キー制約
                        $table->foreign('Userid')
		                ->references('id')
		                ->on('buy_users')
		                ->onDelete('cascade');
                        $table->engine = 'InnoDB'; 
            
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
