<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerEducation extends Model
{
    use HasFactory;
    protected $table = 'seeker_education';
    protected $foreignKey = 'seeker_id';
    // protected $primaryKey = 'seeker_id';
    protected $fillable =  [
        'seeker_id', 'last_education', 'major', 'institute_name', 'graduation_year', 'gpa'
    ];

    public function seeker()
    {
        return $this->belongsTo(Seeker::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'major');
    }
}