<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $fillable =  [
        'name', 'locationid', 'status'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function getNameAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =  strtolower(ucwords($value));
    }
}