<?php

namespace Database\Seeders;

use App\Models\Staff;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!Role::where('name', 'Admin')->where('guard_name', 'staff')->exists()) {
            Role::create([
                'name' => 'Admin',
                'guard_name' => 'staff'
            ]);
        }

        // Create admin user
        $adminRole = Role::where('name', 'Admin')->where('guard_name', 'staff')->first();
        if ($adminRole && !Staff::where('email', 'admin@gmail.com')->exists()) {
            Staff::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'photo' => 'null',
                'password' => Hash::make('password')
            ])->assignRole($adminRole);
            }
    }
}
