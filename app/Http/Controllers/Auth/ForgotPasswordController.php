<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

use App\Traits\CaptchaTrait;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails{
        sendResetLinkEmail as laravelSendResetLinkEmail;
    }
    use CaptchaTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        if ($this->captchaCheck($request) == false) {
            return redirect()->back()->withCapchaError('Sorry, Wrong Captcha')->withInput();
        }

        return $this->laravelSendResetLinkEmail($request);

    }
}
