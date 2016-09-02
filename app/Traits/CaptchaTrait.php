<?php namespace App\Traits;

use Illuminate\Http\Request;
use Input;
use ReCaptcha\ReCaptcha;

trait CaptchaTrait {

    public function captchaCheck(Request $request)
    {

//        $response = Input::get('g-recaptcha-response');
        $response = $request->input('g-recaptcha-response');

        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RE_CAP_SECRET');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return true;
        } else {
            return false;
        }

    }

}