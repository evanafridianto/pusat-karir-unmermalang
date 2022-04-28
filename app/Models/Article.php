<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use HasFactory;
    use Sluggable;


    protected $table = 'articles';

    protected $fillable =  [
        'user_id', 'title', 'slug', 'thumbnail', 'content', 'type', 'tag', 'comment_status'
    ];

    // protected $appends = [
    //     'tag'
    // ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return  $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return  $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)
            );
        });

        $query->with('tags')->when($filters['tags'] ?? false, function ($query, $tags) {
            return  $query->whereHas(
                'tags',
                fn ($query) =>
                $query->where('slug', $tags)
            );
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}