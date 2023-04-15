<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
//    protected function create(array $data,Request $request)
//    public function store(Request $request)
//    {

//
//            return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'phone' => $data['phone'],
//            'images' => '/images/'.$images,
//            'password' => Hash::make($data['password']),
//        ]);
//        $user = new User();
//        $user->name = $request->input('name');
//        $user->email = $request->input('email');
////        $user->phone = $request->input('phone');
////        $user->images = $request->input('images');
//        $user->password = $request->input('password');
//        if (request()->has('images'))
//        {
//            $file = $request->file('images');
//            // dd($request->file('image'));
//            $extension = $file->getClientOriginalExtension();
//            $filename = $file->getClientOriginalName();
//            $file->move('categorypic/', $filename);
//            $user->images = $filename;
//
//        }
//        $user->save();
//        return redirect('/home');
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'phone' => $data['phone'],
//            'images' => $data['images'],
//            'password' => Hash::make($data['password']),
//        ]);

//    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
