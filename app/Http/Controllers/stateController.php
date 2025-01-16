<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Tables\States;
use Illuminate\Http\Request;
use App\Forms\CreateStateForm;
use App\Forms\UpdateStateForm;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\Facades\Splade;
use App\Http\Requests\StoreStateRequest;

class stateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.states.index", [ 
            "states"=>States::class,
            ]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.states.create", [

            "statesForm"=> CreateStateForm::class,
        ]);
        return to_route('admin.state.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,CreateStateForm $form)
    {
        $data = $form->validate($request);
        $state = State::create($data);
        Splade::toast('state updated')->autoDismiss('3');//message
        return to_route('admin.state.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        return view("admin.states.edit", [
            "statesFormUpdate"=> UpdateStateForm::make()
            
             ->action(route('admin.state.update',$state))
             ->fill($state),
               
        ]);
        return to_route('admin.state.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,State $state,updateStateForm $form)
    {
        $data = $form->validate($request);
        $state->update($data);
        Splade::toast('state updated')->autoDismiss('3');//message
        return to_route('admin.state.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();
        Splade::toast('state deleted')->autoDismiss('3');//
        return back();
        
    }
}