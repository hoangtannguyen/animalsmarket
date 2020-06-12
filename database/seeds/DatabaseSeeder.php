<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProducttypeTableSeeder::class);
        $this->call(ProductacceTableSeeder::class);
        $this->call(ProductnawingTableSeeder::class);
        $this->call(CategorysTableSeeder::class);
     

    }
}
