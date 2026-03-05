<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const STATE_INACTIVE = 0;
    const STATE_ACTIVE = 1;
    const STATE_DELETED = 2;

    public static function getState()
    {
        return [
            self::STATE_ACTIVE => 'Active',
            self::STATE_INACTIVE => 'Inactive',
            self::STATE_DELETED  => 'Deleted'
        ];
    }

    public function state()
    {
        return self::getState()[$this->state_id] ?? 'Unknown';
    }

    protected $fillable = [
        'id',
        'title',
        'description',
        'state_id'
    ];
}
