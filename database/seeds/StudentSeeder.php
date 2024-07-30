<?php

use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Auth\Database\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
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
                'name' => 'Student',
                'slug' => 'student',
                'http_method' => '',
                'http_path' => '/students*',
            ],
        ]);

        // 添加菜单
        Menu::insert([
            [
                'parent_id' => 0,
                'order' => 9,
                'title' => 'Student',
                'icon' => 'fa-user',
                'uri' => '/students',
            ],
        ]);

        // 给 Teacher 添加权限 和 菜单
        $teacher_role = Role::where('slug', 'teacher')->first();
        $teacher_role->permissions()->save(Permission::whereIn('slug', ['student'])->first());
        Menu::where('uri', '/students')->first()->roles()->save($teacher_role);

        // 添加一个用户
        \App\Models\Student::create([
            'username' => 'student',
            'password' => Hash::make('student'),
            'name' => 'Student',
        ]);

        // 添加 200 个学生
        factory(App\Models\Student::class, 200)->create();
    }
}
