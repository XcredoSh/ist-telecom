<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'name' => 'super', 'description' => 'at super admin'],
            ['id' => 2, 'name' => 'company', 'description' => 'at company']
        ];
        foreach($roles as $role){
            Role::create($role);
        }

    }
}
