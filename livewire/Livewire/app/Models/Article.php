<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Make sure these relationships are defined in your Article model
    
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reviewedBy()
    {
        return $this->belongsToMany(User::class, 'reviews')->withTimestamps();
    }
}
