<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Tables\Countries;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\Facades\Splade;
use App\Http\Requests\storeCountryRequest;
use ProtoneMedia\Splade\FormBuilder\Input;
use App\Http\Requests\updateCountryRequest;
use ProtoneMedia\Splade\FormBuilder\Submit;

class countryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        return view("admin.countries.index",[
            "countries"=>Countries::class
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.countries.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCountryRequest $request, Country $country)
    {
        $country->create($request->validated());
        Splade::toast('Country Created')->autoDismiss(3);
        return to_route("admin.country.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        // return view("admin.countries.edit", compact('country')); 
        $form = SpladeForm::make()
        ->action(route('admin.country.update',$country))
        ->method('PUT ' )
        ->fill($country)
        ->class('space-y-4 bg-white rounded ')
        ->fields([
            Input::make('name')->label('User Name'),
            Input::make( 'Country_code')->label('Country code'),
            Submit::make()->label('update '),
        ]);
        return view(' admin.countries.edit', [
            'form' => $form,
            'Country'=> $country,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateCountryRequest $request,Country $country)
    {
        $country->update($request->validated());
        Splade::toast('Country Updated')->autoDismiss(3);
        return to_route("admin.country.index");

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(country $country)
    {
        $country->delete();
        Splade::toast('Country Deleted')->autoDismiss(3);
return back();
        // return to_route("admin.country.index");
    }
}