<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',
           'order-list',
           'order-create',
           'order-edit',
           'order-delete',
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'brand-list',
           'brand-create',
           'brand-edit',
           'brand-delete',
           'unit-list',
           'unit-create',
           'unit-edit',
           'unit-delete',
           'status-list',
           'status-create',
           'status-edit',
           'status-delete',
           'tag-list',
           'tag-create',
           'tag-edit',
           'tag-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}