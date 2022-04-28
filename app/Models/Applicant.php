<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Applicant extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable =  [
        'seeker_id', 'vacancy_id', 'message', 'status'
    ];


    public function documents()
    {
        return $this->morphMany(Media::class, 'model');
    }


    public function seeker()
    {
        return $this->belongsTo(Seeker::class);
    }
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function scopeApplicationcount($query, $employer_id)
    {
        return $query->whereHas(
            'vacancy',
            fn ($query) =>
            $query->where('employer_id', $employer_id)
        );
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters->status ?? false, function ($query, $filters) {
            return $query->where(
                'status',
                $filters
            );
        });

        $query->when($filters->job_type ?? false, function ($query, $filters) {
            return $query->whereHas(
                'vacancy',
                fn ($query) =>
                $query->where('job_type', $filters)
            );
        });

        $query->when($filters->category  ?? false, function ($query, $filters) {
            return $query->whereHas(
                'vacancy',
                fn ($query) =>
                $query->whereHas(
                    'categories',
                    fn ($query) =>
                    $query->where('slug', $filters)
                )
            );
        });
    }
}