<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Refundable;
use App\Models\Tag;
use App\Models\Unit;
use App\Models\Status;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Brand1',
            'Brand2',
            'Brand3',
            'Brand4',
            'Brand5'
         ];
      
         foreach ($brands as $brand) {
              Brand::create(['name' => $brand]);
         }

         $categories = [
            'Category1',
            'Category2',
            'Category3',
            'Category4',
            'Category5'
         ];
      
         foreach ($categories as $category) {
              Category::create(['name' => $category]);
         }

         $refundables = [
            'Yes',
            'No'
            
         ];
      
         foreach ($refundables as $refundable) {
            Refundable::create(['name' => $refundable]);
         }

         $tags = [
            'Tag1',
            'Tag2',
            'Tag3',
            'Tag4',
            'Tag5'
         ];
      
         foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
         }

         $units = [
            'Unit1',
            'Unit2',
            'Unit3',
            'Unit4',
            'Unit5'
         ];
      
         foreach ($units as $unit) {
            Unit::create(['name' => $unit]);
         }
         $status = [
            'Beklemede',
            'Onaylandı',
            'Hazırlanıyor',
            'Kargo',
            'Teslim Edildi',
            'İptal'
         ];
      
         foreach ($status as $status) {
            Status::create(['name' => $status]);
         }
    }
}
