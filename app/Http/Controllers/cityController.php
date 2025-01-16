<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Tables\Cities;
use Illuminate\Http\Request;
use App\Forms\CreateCityForm;
use App\Forms\UpdateCityForm;
use ProtoneMedia\Splade\Facades\Splade;

class cityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.cities.index",[
            "cities"=>Cities::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cities.create',[
            'CityForm'=>CreateCityForm::class
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,CreateCityForm $form)
    {
        $data = $form->validate($request);
        $city = City::create($data);
        Splade::toast('City Created')->autoDismiss('3');
        return to_route('admin.city.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)    
    {
        return view('admin.cities.edit',[   

            'cityFormUpdate' =>UpdateCityForm::make()
            ->action(route('admin.city.update', $city))
            ->fill($city)

                 ]);
            
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city, UpdateCityForm $form)
    {
        $data = $form->validate($request);
        $city->update($data);
        Splade::toast('City Updated ')->autoDismiss('3');
        return to_route('admin.city.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city) 
    {
        $city->delete();
     Splade ::toast('City Deleted')->autoDismiss('3');
        return back();
    }
}