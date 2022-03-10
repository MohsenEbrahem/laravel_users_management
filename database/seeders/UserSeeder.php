<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Post;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'Admin','guard_name'=>'web']);
        Role::create(['name'=>'Admin assistant','guard_name'=>'web']);
        Permission::create(['name'=>'Delete a member','guard_name'=>'web']);
        Permission::create(['name'=>'Delete a post','guard_name'=>'web']);
        Permission::create(['name'=>'Accept a post','guard_name'=>'web']);
        Permission::create(['name'=>'Assign new role to a member','guard_name'=>'web']);
        $role=Role::findOrFail(1);
        $role->syncPermissions(Permission::all());
        $role=Role::findOrFail(4);
        $role->syncPermissions(['Delete a post','Accept a post']);
        $user=User::findOrFail(1);
        $user->assignRole('Admin');
        Post::create(['content'=>'product','postOwner'=>1]);
    }
}
