<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Vacancy extends Model
{
    use Sluggable;
    use HasFactory;

    protected $table = 'vacancies';

    protected $fillable =  [
        'user_id', 'job_title', 'slug', 'description', 'job_type', 'expiry_date'
    ];

    protected $appends = [
        'category_ids', 'category_names',
    ];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters->search ?? false, function ($query, $filters) {
            return $query->whereHas(
                'employers',
                fn ($query) =>
                $query->where('company_name', 'like', '%' . $filters . '%')
            )->orWhere('job_title', 'like', '%' . $filters . '%')
                ->orWhere('description', 'like', '%' . $filters . '%');
        });

        $query->when($filters->job_type  ?? false, function ($query, $filters) {
            return $query->where('job_type',  $filters);
        });

        $query->when($filters->address  ?? false, function ($query, $filters) {
            return  $query->whereHas(
                'address',
                fn ($query) =>
                $query->whereHas(
                    'city',
                    fn ($query) =>
                    $query->where('name', 'like', '%' . $filters . '%')
                )
            );
        });


        $query->when($filters->category  ?? false, function ($query, $filters) {
            return  $query->whereHas(
                'categories',
                fn ($query) =>
                $query->where('slug', $filters)
            );
        });
    }

    public function employers()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'job_title'
            ]
        ];
    }

    public function getCategoryIdsAttribute()
    {
        return $this->categories->pluck('id');
    }
    public function getCategoryNamesAttribute()
    {
        return $this->categories->implode('name', ', ');
    }
}