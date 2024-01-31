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
     *  Seeder para agregar usuarios
     * @return void
     */
    public function run(): void
    {
        
       $user =  User::create([
            'name' => 'Adrian',
            'email' => 'adrian@gmail.com',
            'password' => '$2y$10$cmg/N6nii7HmAbZQsTV4keZIJUByjunHdNC.WgwIt/FStTOvj/wCq',
        ]);

        // $role_admin = Role::create(['name' => 'Admin']);
        // $user->assignRole($role_admin);

        $user_invited = User::create([
            'name' => 'Giovanna',
            'email' => 'giovanna@gmail.com',
            'password' => '$2y$10$cmg/N6nii7HmAbZQsTV4keZIJUByjunHdNC.WgwIt/FStTOvj/wCq',
        ]);

        // $role_invited = Role::create(['name' => 'Invitado']);
        // $user_invited->assignRole($role_invited);
    }
}
