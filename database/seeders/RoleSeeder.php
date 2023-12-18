<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * php artisan db:seed --class=RoleSeeder
     *  Seeder para agregar el admin
     * @return void
     */
    public function run(): void
    {
        
       $user =  User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$cmg/N6nii7HmAbZQsTV4keZIJUByjunHdNC.WgwIt/FStTOvj/wCq',
        ]);

        $role = Role::create(['name' => 'Admin']);

        $user->assignRole($role);

        // $user =  User::create([
        //     'name' => 'Mantenimiento',
        //     'email' => 'mantenimiento@example.com',
        //     'password' => '$2y$10$cmg/N6nii7HmAbZQsTV4keZIJUByjunHdNC.WgwIt/FStTOvj/wCq',
        // ]);

        // $role = Role::create(['name' => 'Mantenimiento']);
        // $role_two = Role::create(['name' => 'Super Admin']);

        // $user->assignRole($role);
    }
}
