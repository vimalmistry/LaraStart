<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Socialite;
use Session;
use Image;
use App\Social;
use App\User;
use App\Role;

class SocialController extends Controller
{

    /**
     *
     * Get Social Redirect
     *
     * @param $provider
     * @return $this
     */
    public function getSocialRedirect($provider)
    {
        $providerKey = \Config::get('services.' . $provider);
        if (empty($providerKey))
            return view('pages.status')->with('error', 'No such provider');

        return Socialite::driver($provider)->redirect();
    }


    /**
     *
     *  Get Data From Social Site
     *
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getSocialHandle($provider)
    {

        $user = Socialite::driver($provider)->user();

//        dd($user);

        $social_user = null;

        //CHECK IF USERS EMAIL ADDRESS IS ALREADY IN DATABASE
        $user_check = User::where('email', '=', $user->email)->first();


        if (!empty($user_check)) {

            $social_user = $user_check;
        } else // USER IS NOT IN DATABASE BASED ON EMAIL ADDRESS
        {

            $same_social_id = Social::where('social_id', '=', $user->id)->where('provider', '=', $provider)->first();
            // CHECK IF NEW SOCIAL MEDIA USER

//            dd($same_social_id);
            if (empty($same_social_id)) {

                $new_social_user = new User;

                $new_social_user->email = $user->email;


//                $name = explode(' ', $user->name);
                if ($user->email) {
                    $new_social_user->email = $user->email;
                }

                $new_social_user->password = bcrypt(str_random(8));
                $new_social_user->name = $user->name;


                $new_social_user->gender = $user->user['gender'];

//                $new_social_user->first_name      	= $name[0];
                // CHECK FOR LAST NAME
//                if (isset($name[1])) {
//                	$new_social_user->last_name     = $name[1];
//                }
                //added by Vimal Mistry
//                $new_social_user->fullname = $name[0] . isset($name[1]) ? $name[1] : null;

                $new_social_user->status = 'active';
//                $the_activation_code = str_random(60) . $user->email;


                $new_social_user->ref_code = User::refCode();

                //store if any from referrals
                if (Session::has('ref_id')) {
                    $new_social_user->ref_user_id = Session::get('ref_id');
                }
                $activation_code = md5($user->email . str_random(60));//str_random(60) . $request->input('email');

                $_imgName = str_random(10) . time();
//                $user->avatar = 'default.jpg';//Image::make('public/' . $_imgName . '.jpg')->resize(300, 200);//'default.jpg';




                $_fullpath = public_path('uploads/'.$_imgName.'.jpg');
                Image::make($user->avatar_original)->resize(300, 200)->save($_fullpath);

                $new_social_user->avatar = $_imgName.'.jpg';
                $new_social_user->activation_token = $activation_code;
                $new_social_user->save();

                $social_data = new Social;
                $social_data->social_id = $user->id;
                $social_data->provider = $provider;
                $new_social_user->social()->save($social_data);

                // ADD ROLE
                $role = Role::whereName('user')->first();
                $new_social_user->assignRole($role);

                $social_user = $new_social_user;

                // LINK TO PROFILE TABLE
//                $profile = new Profile;
//                $social_user->profile()->save($profile);
            } else {
                //Load this existing social user
                $social_user = $same_social_id->user;
            }
        }


        \Auth::login($social_user, true);
//        $this->auth->login($social_user, true);

        return redirect('/');

//        if ($this->auth->user()->hasRole('user'))
//        {
//            //return redirect()->route('user.home');
//            return redirect($this->redirectAfterSocialLogin);
//        }
//
//        if ($this->auth->user()->hasRole('administrator'))
//        {
//            return redirect($this->redirectAfterSocialLogin);
//            //return redirect()->route('admin.home');
//        }

        return \App::abort(500);
    }

}
