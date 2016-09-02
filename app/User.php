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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Return Unique Generated Code for Referal Url
     * @return null|string
     */
    public static function refCode()
    {
        $code = null;
        do {
            $code = str_random(5);
            $total = User::where('ref_code', $code)->count();
        } while ($total != 0);

        return $code;
    }


    // USER ROLES
    /**
     * Users have Many Roles
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }


    /**
     * Check User have Specific Role with its name
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $name) return true;
        }

        return false;
    }

    /**
     * Assign User Role
     * @param $role
     */
    public function assignRole($role)
    {
        if (!$this->roles->contains($role)) {

            return $this->roles()->attach($role);

        }
//        return $this->roles()->sync([$role=>['role'=>$role]]);
    }

    /**
     * Remove Role from previously Assigned
     * @param $role
     * @return int
     */
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    // SOCIAL MEDIA AUTH
    public function social()
    {
        return $this->hasMany('App\Social');
    }

}
