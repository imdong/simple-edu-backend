<?php

namespace App;

use App\Scopes\AdminUserScope;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Auth\Database\Role;

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
class AdminUser extends Administrator
{
    protected $attributes = [
        'type' => 'system',
    ];

    protected static function boot()
    {
        parent::boot();

        // 只允许查询 type = teacher
        static::addGlobalScope(new AdminUserScope());
    }
}
