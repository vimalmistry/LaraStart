<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    
    
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }



//    //Define all permission here
//    public function data()
//    {
//        return [
//
//            1 => [
//                'name'=>'Manage Users',
//                'slug'=>'manage.users',
//                'description'=>'This user can delete upldate permissions'
//                'parent'=>0
//            ];
//
//
//        ];
//    }
    
    
}
