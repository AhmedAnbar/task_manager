<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $create_ticket = Permission::create([
          'name' => 'create-ticket',
          'display_name' => 'Create Ticket',
          'description' => 'Create New Ticket'
        ]);
        $edit_ticket = Permission::create([
          'name' => 'edit-ticket',
          'display_name' => 'Edit Ticket',
          'description' => 'Edit Existing Ticket'
        ]);
        $delete_ticket = Permission::create([
          'name' => 'delete-ticket',
          'display_name' => 'Delete Ticket',
          'description' => 'Delete Existing Ticket'
        ]);
        $close_ticket = Permission::create([
          'name' => 'close-ticket',
          'display_name' => 'Close Ticket',
          'description' => 'Close Existing Ticket'
        ]);
        $open_ticket = Permission::create([
          'name' => 'open-ticket',
          'display_name' => 'Open Ticket',
          'description' => 'Open Pending Ticket'
        ]);
        $reopen_ticket = Permission::create([
          'name' => 'reopen-ticket',
          'display_name' => 'Reopen Ticket',
          'description' => 'Reopen Closed Ticket'
        ]);
    }
}
