<?php

namespace App\Http\Controllers;

use App\Models\Cubaista;
use App\Http\Requests\StoreCubaistaRequest;
use App\Http\Requests\UpdateCubaistaRequest;
use App\Providers\RouteServiceProvider;

class CubaistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCubaistaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCubaistaRequest $request)
    {
        
        if($request->inlineRadioOptions == "option1"){
          
           /* $request->validate([
                'firstname1' => ['required', 'string', 'max:254'],
                'lastname1' => ['required', 'string', 'max:254'],
                'email' => ['required', 'string', 'email', 'max:254', 'unique:cubaista']                
            ]);*/

            $first_name  = $request->firstname1;
            $last_name  = $request->lastname1;
            $email  = $request->email1;
            $additional_notes  = $request->additional_notes1;
            $cubaista = Cubaista::firstOrNew(['email' =>  $email]);
 
            $cubaista->first_name = $first_name;
            $cubaista->last_name = $last_name;
            $cubaista->website = '';
            $cubaista->company_name = '';
            $cubaista->additional_notes = $additional_notes;
            $cubaista->save();
           

            //enviar el mail
            //redirect para la pagina de revise su correo
           return redirect(RouteServiceProvider::WELCOME)->with('success',' Please check your email for confirmation!');  
        }
        if($request->inlineRadioOptions == "option2"){
            $request->validate([
                'firstname2' => ['required', 'string', 'max:254'],
                'lastname2' => ['required', 'string', 'max:254'],
                'email2' => ['required', 'string', 'email', 'max:254', 'unique:cubaista'],
                'website2' => ['required', 'string', 'max:254'],
                'company_name2' => ['required', 'string', 'max:254']
            ]);

            $cubaista = Cubaista::create([
                'first_name' => $request->firstname2,
                'last_name' => $request->lastname2,
                'email' => $request->email2,                
                'website' => $request->website2,                            
                'company_name' => $request->company_name2,
                'additional_notes' => $request->additional_notes2,
            ]);
            //enviar el mail
            //redirect para la pagina de revise su correo
            //return redirect(RouteServiceProvider::HOME);
        }
        if($request->inlineRadioOptions == "option3"){
            $request->validate([
                'firstname3' => ['required', 'string', 'max:254'],
                'lastname3' => ['required', 'string', 'max:254'],
                'email3' => ['required', 'string', 'email', 'max:254', 'unique:cubaista'],
                'website3' => ['required', 'string', 'max:254'],
                'company_name3' => ['required', 'string', 'max:254']
            ]);

            $cubaista = Cubaista::create([
                'first_name' => $request->firstname3,
                'last_name' => $request->lastname3,
                'email' => $request->email3,                
                'website' => $request->website3,                            
                'company_name' => $request->company_name3,
                'additional_notes' => $request->additional_notes3,
            ]);
            //enviar el mail
            //redirect para la pagina de revise su correo
            //return redirect(RouteServiceProvider::HOME);
        }
        if($request->inlineRadioOptions == "option4"){
            $request->validate([
                'firstname4' => ['required', 'string', 'max:254'],
                'lastname4' => ['required', 'string', 'max:254'],
                'email4' => ['required', 'string', 'email', 'max:254', 'unique:cubaista'],
                'website4' => ['required', 'string', 'max:254'],
                'company_name4' => ['required', 'string', 'max:254']
            ]);

            $cubaista = Cubaista::create([
                'first_name' => $request->firstname4,
                'last_name' => $request->lastname4,
                'email' => $request->email4,                
                'website' => $request->website4,                            
                'company_name' => $request->company_name4,
                'additional_notes' => $request->additional_notes4,
            ]);
            //enviar el mail
            //redirect para la pagina de revise su correo
            //return redirect(RouteServiceProvider::HOME);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cubaista  $cubaista
     * @return \Illuminate\Http\Response
     */
    public function show(Cubaista $cubaista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cubaista  $cubaista
     * @return \Illuminate\Http\Response
     */
    public function edit(Cubaista $cubaista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCubaistaRequest  $request
     * @param  \App\Models\Cubaista  $cubaista
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCubaistaRequest $request, Cubaista $cubaista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cubaista  $cubaista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cubaista $cubaista)
    {
        //
    }
}
