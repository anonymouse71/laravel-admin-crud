<?php

class UserTableSeeder extends Seeder
{
    public function run(){
        DB::table('users')->delete();
        User::create(array(
            'username' =>'talha',
            'password' =>Hash::make('talha'),
            'email' =>'talhaqc@gmail.com',
            'phone' =>'01234',
            'name' =>'MD. ABU TALHA',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ));

        DB::table('users')->insert([
            'username' =>'talha1',
            'password' =>Hash::make('talha1'),
            'email' =>'talhaqc1@gmail.com',
            'phone' =>'012341',
            'name' =>'MD. ABU TALHA1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('users')->insert([
            'username' =>'talha2',
            'password' =>Hash::make('talha2'),
            'email' =>'talhaqc2@gmail.com',
            'phone' =>'012342',
            'name' =>'MD. ABU TALHA2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}