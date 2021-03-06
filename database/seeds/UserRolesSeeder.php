<?php

use Illuminate\Database\Seeder;
use App\Role;
class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        Role::create([
            'name'   => 'user'
        ]);

        Role::create([
            'name'   => 'editor'
        ]);

        Role::create([
            'name'   => 'administrator'
        ]);
    }
}
