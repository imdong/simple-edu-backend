<?php

use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Auth\Database\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 添加了一些权限
        Permission::insert([
            [
                'name' => 'Teacher',
                'slug' => 'teacher',
                'http_method' => '',
                'http_path' => '/teachers*',
            ],
        ]);

        // 添加角色
        $role = Role::create([
            'name' => 'Teacher',
            'slug' => 'teacher',
        ]);

        // 给角色添加权限
        $role->permissions()->save(Permission::whereIn('slug', ['dashboard'])->first());

        // 添加一个用户
        \App\Models\Teacher::create([
            'username' => 'teacher',
            'password' => Hash::make('teacher'),
            'name' => 'Teacher',
        ]);

        // 添加菜单
        Menu::insert([
            [
                'parent_id' => 0,
                'order' => 8,
                'title' => 'Teacher',
                'icon' => 'fa-user-secret',
                'uri' => '/teachers',
            ],
        ]);

        Menu::where('uri', '/teachers')->first()->roles()->save(Role::where('slug', 'administrator')->first());
    }
}
