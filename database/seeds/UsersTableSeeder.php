<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
          'name' => 'Ahmed',
          'email' => 'ahmed@me.com',
          'password' => bcrypt('password')
        ]);

        $user->attachRoles(['super_admin', 'admin', 'user']);
        $user->attachPermissions(['create-ticket', 'edit-ticket', 'delete-ticket', 'close-ticket', 'open-ticket', 'reopen-ticket']);

        $user1 = User::create([
          'name' => 'Moahmed',
          'email' => 'mohamed@me.com',
          'password' => bcrypt('password')
        ]);

        $user1->attachRoles(['admin']);
        $user1->attachPermissions(['create-ticket', 'close-ticket', 'open-ticket', 'reopen-ticket']);

        $user2 = User::create([
          'name' => 'Ahmed',
          'email' => 'ahmed@me.com',
          'password' => bcrypt('password')
        ]);

        $user2->attachRoles(['admin', 'user']);
        $user2->attachPermissions(['create-ticket', 'close-ticket', 'reopen-ticket']);
    }
}
