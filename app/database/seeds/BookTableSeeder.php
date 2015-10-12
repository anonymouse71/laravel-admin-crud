<?php

class BookTableSeeder extends Seeder
{
    public function run(){
        DB::table('books')->delete();
        Books::create(array(
            'bname' =>'talha',
            'bauthor' =>'talha1',
            'bedition' =>'Eight',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ));

       DB::table('books')->insert([
            'bname' =>'talha',
            'bauthor' =>'talha2',
            'bedition' =>'ten',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('books')->insert([
            'bname' =>'talha',
            'bauthor' =>'talha3',
            'bedition' =>'nine',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}