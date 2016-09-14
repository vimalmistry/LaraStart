<?php

namespace App\Http\Controllers\Auth;

use App\User;
//use DebugBar\DebugBar;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Illuminate\Http\Request;
use App\Logic\User\CaptureIp;

use App\Traits\CaptchaTrait;

use App\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    use CaptchaTrait;


    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',
            ['except' =>
                ['resendEmail', 'activateAccount']]);

//        $this->auth = $auth;
//        $this->userRepository = $userRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }



    //Extended Vimal Mistry

    /**
     *
     * Register Controller
     *
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        if ($this->captchaCheck($request) == false) {
            return redirect()->back()->withCapchaError('Sorry, Wrong Captcha')->withInput();
        }

        $validator = $this->validator($request->all());

        if ($validator->fails()) {

            $this->throwValidationException(
                $request, $validator
            );
        }


        $activation_code = md5($request->input('email') . str_random(60));//str_random(60) . $request->input('email');


        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
//        $user->account_type = $request->input('account_type');@virang sir


//        $_imgName = str_random(10).time();
        $user->avatar = 'default.jpg';

        $user->ref_code = User::refCode();

        //store if any from referrals
        if (Session::has('ref_id')) {
            $user->ref_user_id = Session::get('ref_id');
        }
        $user->activation_token = $activation_code;


        // GET IP ADDRESS
        $userIpAddress = new CaptureIp;
        $user->register_ip = $userIpAddress->getClientIp();

        $user->status = 'pendingActivation';


        //if success than redirect page wich is middleware also
        if ($user->save()) {

            // ADD ROLE
            $role = Role::whereName('user')->first();
            $user->assignRole($role);


            $this->sendEmail($user);//send email to the user
            return view('auth.activateAccount')
                ->with('email', $request->input('email'));
        } else {

            flash(\Lang::get('notCreated'), 'danger');

//            \Session::flash('message', );
            return redirect()->back()->withInput();
        }
    }


    /**
     * Send Email Helper
     *
     * @param User $user
     */
    public function sendEmail(User $user)
    {
        $data = array(
            'name' => $user->name,
            'code' => $user->activation_token
        );

        $response = \Mail::queue('emails.activateAccount', $data, function ($message) use ($user) {
            $message->subject(\Lang::get('auth.pleaseActivate'));
            $message->to($user->email);
        });

//        DebugBar::info($response);
    }

    /**
     * Resend Email Controller
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function resendEmail()
    {
        $user = \Auth::user();
        //if user is not active
        if ($user->status == 'pendingActivation') {
            //if max email send
            if ($user->resent >= 3) {
                return view('auth.tooManyEmails')
                    ->with('email', $user->email);
            } else {

                //else new message send
                $user->resent = $user->resent + 1;
                $user->save();
                $this->sendEmail($user);
                return view('auth.activateAccount')
                    ->with('email', $user->email);
            }
        } else {
            return redirect('/');
        }
    }


    /**
     * @param $code
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    //Activate Account with Email Link
    public function activateAccount($code, User $user)
    {
        if ($this->accountIsActive($code)) {
            flash(\Lang::get('auth.successActivated'), 'success');
            return redirect('/');
        }

        flash(\Lang::get('auth.unsuccessful'), 'danger');
        return redirect('/');

    }


    /**
     * @param $code
     * @return bool
     */
    public function accountIsActive($code)
    {
        $user = User::where('activation_token', '=', $code)->first();
//        dd($user);
        $user->status = 'active';
        $user->activation_token = null;
        if ($user->save()) {
            \Auth::login($user);
        }
        return true;
    }


    /**
     * For Ajax Request
     *
     * @param Request $request
     * @return array
     */
    public function checkEmailExist(Request $request)
    {

        $email = $request->get('email');
        if(User::where('email','=',$email)->first())
        {
            return abort(404);
        }

        return ['status'=>true];

    }


}
