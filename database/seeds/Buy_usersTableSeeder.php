<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buy_users;

class Buy_usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i=0; $i<10; $i++){
            Buy_users::create([
                'name' =>str_random(10),
                'password' =>str_random(10),
                'mail' => str_random(5).'@gmail.com',
                'adress' => str_random(10),
                'total' => mt_rand(),
                'newDate' => now(),
                'deleteFlg' => mt_rand()
                ]);
            
        }
    }
}
