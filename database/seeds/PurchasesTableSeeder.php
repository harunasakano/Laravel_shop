<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchases;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    for($i=1; $i<10; $i++){
		    Purchases::create([
		    'Userid' =>$i,
		    'itemCode' =>str_random(5),
		    'type' => $i,
		    'buyDate' =>now()
		    ]);
	    }
    }
}