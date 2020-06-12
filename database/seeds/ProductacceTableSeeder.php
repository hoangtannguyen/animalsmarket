<?php

use Illuminate\Database\Seeder;
use App\ProductAcce;
class ProductacceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acce = new ProductAcce;
        $acce->id = 1;
        $acce->name = 'Lót nền';
        $acce->save();

        $acce = new ProductAcce;
        $acce->id = 2;
        $acce->name = 'Máng ăn';
        $acce->save();

        $acce = new ProductAcce;
        $acce->id = 3;
        $acce->name = 'Đèn nuôi';
        $acce->save();

        $acce = new ProductAcce;
        $acce->id = 4;
        $acce->name = 'Hang trú & hang trang trí';
        $acce->save();

        $acce = new ProductAcce;
        $acce->id = 5;
        $acce->name = 'Thức ăn';
        $acce->save();

        $acce = new ProductAcce;
        $acce->id = 6;
        $acce->name = 'Bể nuôi';
        $acce->save();

        $acce = new ProductAcce;
        $acce->id = 7;
        $acce->name = 'Trang trí';
        $acce->save();

    }
}
