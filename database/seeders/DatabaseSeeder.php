<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);

        DB::table('users')->insert([
            'name' => 'Lubchik',
            'email' => 'liubomyr.hruzinskyyi@gmail.com',
            'password' => Hash::make('qwe123'),
        ]);

        $user = \App\Models\User::where("name", 'Lubchik')->first();

        $owner = Role::create([
            'name' => 'owner',
            'display_name' => 'Product Owner',
            'description' => 'User is the owner of a given product',
        ]);

        $createProduct = Permission::create([
            'name' => 'add-product',
            'display_name' => 'Create new product',
            'description' => 'create new products',
        ]);

        $updateProduct = Permission::create([
            'name' => 'update-product',
            'display_name' => 'update product',
            'description' => 'update products',
        ]);

        $deleteProduct = Permission::create([
            'name' => 'delete-product',
            'display_name' => 'delete product',
            'description' => 'delete products',
        ]);

        $showProduct = Permission::create([
            'name' => 'list-product',
            'display_name' => 'list products',
            'description' => 'list products',
        ]);

        $owner->attachPermissions([$createProduct, $updateProduct, $deleteProduct, $showProduct]);

        $user->attachRole($owner);
    }
}
