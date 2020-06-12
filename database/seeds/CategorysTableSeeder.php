<?php

use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categorys')->delete();

        \DB::table('categorys')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Bò sát',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Gặm nhắm',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Phụ kiện',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Mới về',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),


        ));


    }
}
