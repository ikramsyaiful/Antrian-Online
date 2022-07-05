<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        DB::table('Users')->insert([
            'name' =>'admin',
            'email' =>'admin@admin', 
            'password' =>Hash::make('admin'),
            'type' => 'admin',
            'key'=>'-',
        ]);
    }
   
}
