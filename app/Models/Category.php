<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'categories';
    protected $fillable =  [
        'name', 'slug', 'type'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class);
    }

    public function employers()
    {
        return $this->hasMany(Employer::class);
    }
    public function seeker_education()
    {
        return $this->hasMany(SeekerEducation::class, 'major');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}