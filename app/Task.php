<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'name_en', 'goal', 'college_type'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('approved');
    }
}
