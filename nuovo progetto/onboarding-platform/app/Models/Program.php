<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'is_active'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Get the users enrolled in this program
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'program_user')
            ->withTimestamps();
    }

    /**
     * Check if the program is currently active
     */
    public function isActive()
    {
        return $this->is_active &&
            $this->start_date->isPast() &&
            ($this->end_date === null || $this->end_date->isFuture());
    }

    /**
     * Get only active programs
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where(function($query) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            });
    }
}
