<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable =  [
        'province', 'city', 'street', 'zip_code'
    ];

    public function addressable()
    {
        return $this->morphTo();
    }

    // public function employers()
    // {
    //     return $this->morphedByMany(Employer::class, 'addressable');
    // }
    // public function seekers()
    // {
    //     return $this->morphedByMany(Seeker::class, 'addressable');
    // }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}