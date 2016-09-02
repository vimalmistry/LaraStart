<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

use Illuminate\Http\Response;

/**
 * Class Authenticate
 * @package Illuminate\Auth\Middleware1
 */
class Authenticate
{
    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string[] ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($guards);

        return $this->isActive($request, $next);


//        return $next($request); //no need
    }


    protected function isActive($request, $next)
    {

//        dd(\Auth::user()->status);
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }


        /**
         * If User is Waiting for Approved
         */
        if (\Auth::user()->status == 'pendingActivation') {

            //\Session::flash('message', 'Please activate your account to proceed.');
            //return redirect()->guest('auth.guest_activate');

            $output = view('auth.guest_activate')
                ->with('email', \Auth::user()->email)
                ->with('date', \Auth::user()->created_at->format('Y-m-d'));

            return new Response($output);
        }

        /**
         * If User is Pending Activation
         */
        if (\Auth::user()->status == 'pendingApproval') {
            //\Session::flash('message', 'Please activate your account to proceed.');
            //return redirect()->guest('auth.guest_activate');
            $output = view('auth.guest_activate')
                ->with('email', \Auth::user()->email)
                ->with('date', \Auth::user()->created_at->format('Y-m-d'));
            return new Response($output);

        }

        return $next($request);
    }


    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  array $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate(array $guards)
    {
        if (empty($guards)) {
            return $this->auth->authenticate();
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }

        throw new AuthenticationException;
    }
}
