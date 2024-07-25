<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;





class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Root']);//Root
        $role2 = Role::create(['name' => 'Admin']);//Admin
        $role3 = Role::create(['name' => 'Customer']);//Customer
        $role4 = Role::create(['name' => 'Supplier']);//Proveedor

        Permission::create(['name'=>'Admin'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'Customer'])->syncRoles([$role3]); 
        Permission::create(['name'=>'Supplier'])->syncRoles([$role4]); 
         
    }
}
