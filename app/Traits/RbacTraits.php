<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 20-9-16
 * Time: 12:33:48 PM
 */

namespace App\Traits;


trait RbacTraits
{

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


//    /**
//     * Alternative of hasRole
//     * @param \Illuminate\Database\Eloquent\Model $name
//     * @return bool
//     */
//    public function is($name)
//    {
//        return $this->hasRole($name);
//    }

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

}