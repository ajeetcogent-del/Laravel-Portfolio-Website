<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const STATE_INACTIVE = 0;
    const STATE_ACTIVE   = 1;
    const STATE_DELETED  = 2;

    public static function states()
    {
        return [
            self::STATE_INACTIVE => 'Inactive',
            self::STATE_ACTIVE   => 'Active',
            self::STATE_DELETED  => 'Deleted',
        ];
    }

    public function getStateLabel()
    {
        return self::states()[$this->state] ?? 'Unknown';
    }

    public function getStateBadge()
    {
        return match ($this->state) {
            self::STATE_ACTIVE   => 'success',
            self::STATE_INACTIVE => 'warning',
            self::STATE_DELETED  => 'danger',
            default => 'secondary',
        };
    }

    const ROLE_ADMIN = 1;
    const ROLE_AGENT = 2;
    const ROLE_USER  = 3;

    public static function roles()
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_AGENT => 'Agent',
            self::ROLE_USER  => 'User',
        ];
    }

    public function getRoleLabel()
    {
        return self::roles()[$this->role] ?? 'Unknown';
    }

    public function getRoleBadge()
    {
        return match ($this->role) {
            self::ROLE_ADMIN => 'success',
            self::ROLE_AGENT => 'info',
            self::ROLE_USER  => 'primary',
            default => 'secondary',
        };
    }

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'state',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'integer',
            'state' => 'integer',
        ];
    }
}
