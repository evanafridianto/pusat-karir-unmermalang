<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];


    public function user()
    {
        return $this->morphMany(User::class, 'role_user');
        // return $this->belongsToMany(User::class, 'role_user');
    }
}