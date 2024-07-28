<?php

namespace App\Models;

use Encore\Admin\Auth\Database\HasPermissions;
use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * 学生表
 *
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $remember_token
 */
class Student extends Model
{
    use Authenticatable;
    use HasPermissions;
    use DefaultDatetimeFormat;

    protected $fillable = [
        'username',
        'password',
        'name',
        'remember_token',
    ];
}
