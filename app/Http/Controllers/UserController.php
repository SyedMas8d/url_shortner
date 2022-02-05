<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Helper\Constant;

use App\Models\User;

use Laravel\Socialite\Facades\Socialite;
use Session;
use Crypt;

class UserController extends Controller
{
    public function loginView()
    {
        // dd(Constant::google_redirect_url());   
        try {
            if(Session::has('AdminLogin') && Session::get('AdminLogin')) {
                return redirect()->to('/short_url/create');
            }

            return view('auth.login');
        }
        catch(\Exception $e) {
            return view('common.server-error');
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $result = User::where('email', $request->email)->first();

            if($result && Crypt::decrypt($result->password) == $request->password) {

                Session::put('AdminLogin', true);
                Session::put('Role', $result->email);

                return $this->SendResponse($result, 'Logged In Successfully', Response::HTTP_OK); 
            }
            else {
                return $this->SendResponse($result, 'Oops! Inavlid email or password', Response::HTTP_ACCEPTED); 
            }

            
        }
        catch(\Exception $e) {
            return $this->sendError('Server issue', $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout()
    {
        try {
            Session::flush();

            return redirect()->to('/login');
        }
        catch(\Exception $e){
            
            return redirect()->to('/');
        }
    }

    public function registerView()
    {
        try {
            if(Session::has('AdminLogin') && Session::get('AdminLogin')) {
                return redirect()->to('/short_url/create');
            }

            return view('auth.register');
        }
        catch(\Exception $e) {
            return view('common.server-error');
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $result = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Crypt::encrypt($request->password)
            ]);

            if($result) {
                Session::put('AdminLogin', true);
                Session::put('Role', $result->email);

                return $this->SendResponse($result, 'Registered Successfully', Response::HTTP_OK);
            }
            else {
                return $this->SendResponse($result, 'Oops! Somthing went wrong, Try again!', Response::HTTP_ACCEPTED); 
            }
        }
        catch(\Exception $e) {
            return $this->sendError('Server issue', $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function googleLoginView()
    {
        try {
            if(Session::has('AdminLogin') && Session::get('AdminLogin')) {
                return redirect()->to('/short_url/create');
            }

            return Socialite::driver('google')->redirect();
        }
        catch(\Exception $e) {dd($e);
            return view('common.server-error');
        }
    }

    public function googleLogin(Request $request)
    {
        try {
            $google = Socialite::driver('google')->user();

            $result = User::updateOrCreate(
                [
                    'email' => $google->user['email']
                ],
                [
                    'username' => $google->user['given_name'] ? $google->user['given_name'] : "",
                    'email' => $google->user['email'] ? $google->user['email'] : "",
                    'google_id' => $google->user['id']
                ]
            );
            
            if($result) {
                Session::put('AdminLogin', true);
                Session::put('Role', $result->google_id);

                return redirect()->to('/short_url/create');
            }
            else {
                return $this->SendResponse($result, 'Oops! Somthing went wrong, Try again!', Response::HTTP_ACCEPTED); 
            }
        }
        catch(\Exception $e) {
            return view('common.server-error');
        }
    }

    public function passwordGenarator(Request $request)
    {
        try {
            return $this->SendResponse(Crypt::encrypt($request->password), 'password', Response::HTTP_OK);
            dd($request->password, Crypt::encrypt($request->password));
        }
        catch(\Exception $e) {
            return $this->sendError('Server issue', $e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
