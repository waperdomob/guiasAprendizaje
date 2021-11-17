<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create([
            'name' => 'instructor',
            'guard_name' => 'web'
        ]);
        $role2 = Role::create([
            'name' => 'aprendiz',
            'guard_name' => 'web'
        ]);

        Permission::create(['name' => 'guias.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'guias.create'])->assignRole($role1);
        Permission::create(['name' => 'guias.edit'])->assignRole($role1);
        Permission::create(['name' => 'guias.destroy'])->assignRole($role1);
        
        Permission::create(['name' => 'instructor.index'])->assignRole($role1);
        Permission::create(['name' => 'instructor.create'])->assignRole($role1);
        Permission::create(['name' => 'instructor.edit'])->assignRole($role1);
        Permission::create(['name' => 'instructor.destroy'])->assignRole($role1);


    }
}
