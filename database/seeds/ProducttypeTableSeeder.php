<?php

use Illuminate\Database\Seeder;
use App\ProductType;
class ProducttypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $type = new ProductType;
      $type->id = 1 ;
      $type->name = 'Rồng Cảnh';
      $type->save();

      $type = new ProductType;
      $type->id = 2 ;
      $type->name = 'Rùa nước';
      $type->save();

      $type = new ProductType;
      $type->id = 3 ;
      $type->name = 'Rùa Cạn';
      $type->save();

      $type = new ProductType;
      $type->id = 4 ;
      $type->name = 'Ếch cảnh';
      $type->save();

      $type = new ProductType;
      $type->id = 5 ;
      $type->name = 'Nhện cảnh';
      $type->save();

      $type = new ProductType;
      $type->id = 6 ;
      $type->name = 'Kỳ đà cảnh';
      $type->save();

      $type = new ProductType;
      $type->id = 7 ;
      $type->name = 'Tắc kè';
      $type->save();

    }
}
