<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;

use App\Helpers\LoginHelper\Helper;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function login()
    {
        if (current_user() == null)
        {
            $provider = new \BDE42\OAuth2\Client\Provider\Marvin([
                'clientId'          => env('42_ID'),
                'clientSecret'      => env('42_SECRET'),
                'redirectUri'       => 'http://localhost:8000/auth/login'
            ]);
            
            // If we don't have an authorization code then get one
            if (!isset($_GET['code'])) {
                $authUrl = $provider->getAuthorizationUrl(/*options*/);
                session(['oauth2state' => $provider->getState()]);
                return redirect($authUrl);

            // Check given state against previously stored one to mitigate CSRF attack
            } else if (empty($_GET['state']) || $_GET['state'] !== session('oauth2state'))
            {
                session(['oauth2state' => null]);
                exit('Invalid state');
            }
            
            // Try to get an access token (using the authorization code grant)
            $token = $provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);
            
            // Try to get an access token (using the authorization code grant)
            try {
                $user = $provider->getResourceOwner($token);
            } catch (Exception $e) {
                exit('Oh dear...');
            }

            login($user->getUserInfos()); //Basic informations (uid, email, name and login)
            //$user->toArray() //Get all user informations whose you have the access authorization
            
            print_r ("NEW USER : ".json_encode(current_user()));
            return redirect('/clubs');
        } else {
            print_r ("REGISTERED USER : ".json_encode(current_user()));
            logout();
        }
    }
    
    public function getLogin() {
        print_r(current_user());
        return;
    }
    
    public function getLogout() {
        logout();
    }
    
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
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
}
