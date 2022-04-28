<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;

class Seeker extends Model
{
    use HasFactory;
    // use Sluggable;
    protected $table = 'seekers';
    protected $foreignKey = 'user_id';
    protected $fillable =  [
        'fisrt_name', 'last_name', 'logo', 'date_of_birth', 'gender', 'marital_status', 'telp', 'website', 'description',
    ];

    protected $appends = ['province', 'city', 'major'];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function seeker_education()
    {
        return $this->hasOne(SeekerEducation::class);
    }


    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function getProvinceAttribute()
    {
        return $this->address->province->name;
    }
    public function getCityAttribute()
    {
        return $this->address->city->name;
    }
    public function getMajorAttribute()
    {
        return $this->seeker_education->category->name;
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => ['first_name', 'first_name'],
    //             'separator' => '-'
    //         ]
    //     ];
    // }
}