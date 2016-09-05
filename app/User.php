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


    //For Latter Use

//
//    // ACCOUNT EMAIL ACTIVATION
//    public function accountIsActive($code) {
//
//        // CHECK IF ACTIVATION CODE MATCHES THE ONE WE SENT
//        $user = User::where('activation_code', '=', $code)->first();
//
//        // GET IP ADDRESS
//        $userIpAddress                          = new CaptureIp;
//        $user->signup_confirmation_ip_address   = $userIpAddress->getClientIp();
//
//        // SET THE USER TO ACTIVE
//        $user->active                           = 1;
//
//        // CLEAR THE ACTIVATION CODE
//        $user->activation_code                  = '';
//
//        // SAVE THE USER
//        if($user->save()) {
//            \Auth::login($user);
//        }
//        return true;
//    }


    /**
     * Afterword moved to separate logics
     * Return Unique Generated Code for Referal Url
     *
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
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role')
            ->withPivot('by_id')
            ->withTimestamps();
    }


    /**
     * Check User have Specific Role with its name
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        foreach ($this->roles()->select('name')->get() as $role) {
            if ($role->name == $name) return true;
        }

        return false;
    }

    /**
     * Assign User Role
     * @param $role
     */
    public function assignRole($role, $by_id = null)
    {
        if (!$this->roles()->contains($role)) {
//            return $this->roles()->attach($role)
            //attach bcoz we have many roles
            return $this->roles()->attach($role, ['by_id' => $by_id]);
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




//Auth::user()->can('manage.adminPanel');

    /**
     * @param $permission
     * @return bool
     *
     * TODO => get role id using permission slug
     * TODO => check this role assigned to user;
     */
    public function hasPermission($permission)
    {
        $object = \App\Permission::select('id')->where('slug', '=', $permission)
            ->with(['roles' => function ($q) {
                $q->select('name');
            }])
            ->first();

        if (!$object) {
            return false;
        }


//        $permission_id = $object->id;

        foreach ($object->roles as $role) {

            if ($this->hasRole($role->name)) return true;
        }

        return false;

    }




    // SOCIAL MEDIA AUTH
    /**
     * Have one social row in social table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function social()
    {
        return $this->hasMany('App\Social');
    }


    /**
     * Has One Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne('App\Country', 'code', 'country');
    }

}
