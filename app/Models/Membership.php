<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membership extends Pivot
{
    use HasFactory;
    protected $fillable =  [
        'status', 'user_id', 'image', 'total_pay', 'expiry_date',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}