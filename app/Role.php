<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];


    /**
     * Has Many User With Roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){

        return $this->belongsToMany('App\User')
            ->withTimestamps();
    }


    /**
     * Has Many Permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission')
            ->withPivot('by_id')
            ->withTimestamps();
    }





    /**
     * Check Role have Specific permission with its name
     *
     * @param $name
     * @return bool
     */
    public function hasPermission($name)
    {
        foreach ($this->permissions as $permission) {
            if ($permission->name == $name) return true;
        }

        return false;
    }

    /**
     * Assign Role Permission
     *
     * @param $permission
     */
    public function assignPermission($permission, $by_id = null)
    {
        if (!$this->permissions->contains($permission)) {
            //attach bcoz we have many roles
            return $this->permissions()->attach($permission,['by_id' => $by_id]);
        }
    }

    /**
     * Remove Permission from previously Assigned
     * @param $permission
     * @return int
     */
    public function removePermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

}
