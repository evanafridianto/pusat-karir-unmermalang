<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $table = 'employers';
    protected $fillable =  [
        'company_name', 'logo', 'description', 'website', 'telp', 'tin', 'business_scale', 'business_field', 'number_of_employee'
    ];
    protected $appends = ['province', 'city', 'categoryb'];
    public function vacancies()
    {
        return $this->hasMany(Vacancy::class, 'employer_id');
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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
    public function getCategorybAttribute()
    {
        return $this->category_id != '' ? $this->category->name : '';
    }
}