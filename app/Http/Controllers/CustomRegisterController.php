<?php

namespace App\Http\Controllers;

use App\Models\Cubaista;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CustomRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mail(string $email)
    {
        return view('customregisterview.index', ['email' => $email]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //        dd($request->inlineRadioOptions);

    dd($request);
    $request->validate([        
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'password_confirmation' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);
    //ver que no haya un euser ocn  ese email
    //cregisterar un user nuevo
    //redirecccionar a dashboard 

    /*  "email" => "momo@momo.co"
      "password" => "dsadsaf"
      "password_confirmation" => "dsf"*/
    $cuba_aux =  Cubaista::where('email', $request->email)->first();

      $user = User::create([
        'name' => $cuba_aux->first_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);



        /** */

        

        

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
