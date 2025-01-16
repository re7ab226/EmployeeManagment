<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Tables\Departments;
use Illuminate\Http\Request;
use App\Forms\CreateDpartmentForm;
use App\Forms\CreateDepartmentForm;
use App\Forms\UpdateDepartmentForm;
use ProtoneMedia\Splade\Facades\Splade;
use App\Forms\UpdatepartmentForm;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.department.index ",[   
            "departments"=> Departments::class
         ] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.department.create",[  
            "DepartmentForm" => 
            CreateDpartmentForm::class

            
         ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,CreateDpartmentForm $form)
    {
        $data=$form->validate($request  );
        $department=Department::create($data);
        Splade::toast('Department Created')->autoDismiss('3');
        return to_route('admin.department.index');
        
        
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
    public function edit(Department $department)
    {
        return view('admin.department.edit',[

           'updateDepartmentForm' =>UpdatepartmentForm::make() 
            ->action(route('admin.department.update',$department))
            ->fill($department)
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Department $department,UpdatepartmentForm $form)

    {
        $data = $form->validate($request);
        $department->update($data);
        Splade::toast('state updated')->autoDismiss('3');//mess
        return to_route('admin.department.index');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return back();
    }
}