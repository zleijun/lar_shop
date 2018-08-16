<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 转字段类型(支持转的数据类型有：integer，real，float，double，string，boolean，object，array，collection，date，datetime 和 timestamp)
     * @var [type]
     */
    protected $casts = [
        'email_verified' => 'boolean',
    ];

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }
}
