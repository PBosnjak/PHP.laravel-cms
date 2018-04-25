<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'college_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class)->withPivot('approved');
    }
    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {

            return $this->hasAnyRole($roles) ||
                abort(401, 'Akcija nije odobrena.');

        }

        return $this->hasRole($roles) ||
            abort(401, 'Akcija nije odobrena.');
    }
    /**

     * Check multiple roles

     * @param array $roles

     */

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**

     * Check one role

     * @param string $role

     */

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
