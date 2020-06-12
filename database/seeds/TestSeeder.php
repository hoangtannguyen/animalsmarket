<?php

use App\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Test::class, 10)->create();
    }
}
