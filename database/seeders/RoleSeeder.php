<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2= Role::create(['name'=>'Blogger']);

        Permission::create(['name'=>'admin.home',
                            'description' => 'See the dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'admin.users.index',
                            'description' => 'See list of users'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit',
                            'description' => 'Assign a role'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.categories.index',
                            'description' => 'See list of categories'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.categories.create',
                            'description' => 'Create categories'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.edit',
                            'description' => 'Edit categories'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.destroy',
                            'description' => 'Delete categories'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.tags.index',
                            'description' => 'See list of tags'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.tags.create',
                            'description' => 'Create tags'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.edit',
                            'description' => 'Edit tags'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.destroy',
                            'description' => 'Delete tags'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.posts.index',
                            'description' => 'See list of posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.create',
                            'description' => 'Create posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.edit',
                            'description' => 'Edit posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.posts.destroy',
                            'description' => 'Delete posts'])->syncRoles([$role1, $role2]);
    }
}
