<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'description' => 'Administrator with full access'
        ]);

        $userRole = Role::create([
            'name' => 'User',
            'description' => 'Regular user with basic access'
        ]);

        $moderatorRole = Role::create([
            'name' => 'Moderator',
            'description' => 'Moderator with limited admin access'
        ]);

        $adminUser = User::where('email', 'admin@ehb.be')->first();
        if ($adminUser) {
            $adminUser->roles()->attach($adminRole->id);
        }

        $regularUser = User::where('email', 'user@user.be')->first();
        if ($regularUser) {
            $regularUser->roles()->attach($userRole->id);
        }
    }
}
