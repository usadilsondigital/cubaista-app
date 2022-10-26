<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('countryview.index', ['countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $random = rand(10000, 99999);
        //change env        
        // config('database.connections.mysql.host')
        // env('CAPTCHA_KEY')
        config(['session.captcha_key' => $random]);
        dd(config('session.captcha_key'));

        $im = imagecreatetruecolor(400, 30);
        $white = imagecolorallocate($im, 255, 255, 255);
        $black = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 399, 29, $white);
        $text = $random;
        $font = './arial.ttf';
        imagettftext($im, 30, 0, 10, 30, $black, $font, $text);
        ob_start();
        imagepng($im);
        $imstr = base64_encode(ob_get_clean());
        imagedestroy($im);
        return view('countryview.create', array('data' => $imstr));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        try {
            $firstNameX = $request->first_name;
            $lastNameX = $request->last_name;
            $phoneX = $request->phone;
            $addressX = $request->address;
            $cityX = $request->city;
            $stateX = $request->state;
            $zipcodeX = $request->zipcode;
            $availableX = $request->available;

            $Country = Country::firstOrNew(['first_name' =>  $firstNameX]);

            $Country->first_name = $firstNameX;
            $Country->last_name = $lastNameX;
            $Country->phone = $phoneX;
            $Country->address = $addressX;
            $Country->city = $cityX;
            $Country->state = $stateX;
            $Country->zipcode = $zipcodeX;
            $Country->available = $availableX;
            $Country->save();
            return redirect('/country');
        } catch (\Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
