<?php

use Illuminate\Database\Seeder;
use App\ProductNawing;
class ProductnawingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nawing = new ProductNawing;
        $nawing->id = 1;
        $nawing->name = 'Sóc cảnh';
        $nawing->save();

        $nawing = new ProductNawing;
        $nawing->id = 2;
        $nawing->name = 'Thỏ cảnh';
        $nawing->save();

    }
}
