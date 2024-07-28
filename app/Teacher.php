<?php

namespace App;

use App\Scopes\TeacherScope;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Auth\Database\Administrator;

/**
 * 教师表
 *
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $type
 * @property string $remember_token
 * @property Role[] $roles
 * @property Permission[] $permissions
 */
class Teacher extends Administrator
{
    protected $attributes = [
        'type' => 'teacher',
    ];

    protected static function boot()
    {
        parent::boot();

        // 只允许查询 type = teacher
        static::addGlobalScope(new TeacherScope());

        static::created(function (Teacher $teacher) {
            $roleModel = config('admin.database.roles_model');
            $roles = $roleModel::where('slug', 'teacher')->pluck('id')->toArray();

            // 在这里设置 roles 的默认值
            $teacher->roles()->attach($roles);
        });
    }

}
