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
        'task_id', 'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
