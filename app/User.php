<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\RbacTraits;

class User extends Authenticatable
{
    use Notifiable;

    use RbacTraits;

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



    public function hide()
    {
        return $this->hidden = [];
    }

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
