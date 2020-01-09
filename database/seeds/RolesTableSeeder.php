<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create([
          'name' => 'super_admin',
          'display_name' => 'Super Admin',
          'description' => 'Can do any thing in the application'
        ]);
        $admin = Role::create([
          'name' => 'admin',
          'display_name' => 'Admin',
          'description' => 'Can do any thing with the ticket'
        ]);
        $user = Role::create([
          'name' => 'user',
          'display_name' => 'User',
          'description' => 'Can only read his own ticket'
        ]);
    }
}
