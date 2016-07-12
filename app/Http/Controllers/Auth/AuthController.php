<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\PagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Socialite;
use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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

    protected $redirectTo = '/';
    protected $redirectPath = '/';
    protected $loginPath = '/login';


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function logoff()
    {
        Auth::logout();
        return redirect('login');
    }

    public function redirectToProvider(Request $request)
    {
            return \Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Linked/Google, etc.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::with('facebook')->user();

        $authUser = $this->findOrCreateUser($user);

        if ($authUser->approved == 'Y') {
            Auth::login($authUser, true);
            return redirect('');
        } else {
            $parameters = ['message' => $authUser->name . ' você não possui acesso ao sistema. Requisição foi enviada.', 'level' => 'warning'];
            return redirect('login')->with($parameters);
        }
    }

    private function findOrCreateUser($facebookUser)
    {

        $authUser = User::where('facebook_id', $facebookUser->id)->first();

        if ( is_null($authUser) ) {
            return User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_id' => $facebookUser->id,
                'avatar' => $facebookUser->avatar,
                'approved' => 'N'
            ]);
        }

        return $authUser;

    }
}
