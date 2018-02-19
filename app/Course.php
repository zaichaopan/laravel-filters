<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Filterable;

class Course extends Model
{
    use Filterable;

    protected $appends = ['started'];

    protected $casts = [
        'free' => 'boolean',
    ];

    protected $guarded = [];

    public function subjects()
    {
        return $this->morphToMany('App\Subject', 'subjectable');
    }

    public function getStartedAttribute()
    {
        return auth()->check() && $this->users->contains(auth()->user());
    }

    public function users()
    {
        return $this->belongsToMany('App\User')
                ->withTimestamps();
    }

    public function getFormattedDifficultyAttribute()
    {
        return ucfirst($this->difficulty);
    }

    public function getFormattedAccessAttribute()
    {
        return  $this->free ? 'Free' : 'Premium';
    }

    public function getFormattedStartedAttribute()
    {
       return  $this->started ? 'Started' : 'Not Started';
    }
}
