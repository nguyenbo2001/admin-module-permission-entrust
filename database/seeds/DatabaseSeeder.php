<?php

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->delete();
        DB::table('roles')->delete();

        // craete admin role
        $role = [
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Full Permission',
        ];
        $role = Role::create($role);

        // set role permission
        $permissions = Permission::all();
        foreach ($permissions as $key => $permission) {
            $role->attachPermission($permission);
        }

        // create admin user
        $user = [
            'name' => 'Admin User',
            'email' => 'nguyenbo2001@gmail.com',
            'password' => bcrypt('abc123456'),
        ];
        $user = User::create($user);

        // set user role
        $user->attachRole($role);
    }
}
