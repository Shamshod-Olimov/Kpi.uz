<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Leadership;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::sortable()->paginate(10);
        $leaderships = Leadership::all();
        return view('department.index', compact('departments', 'leaderships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaderships = Leadership::all();
        return view('department.create', compact('leaderships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'leadership_id' => 'required',
        ]);

        $input = new Department();
        $input->name = $request->name;
        $input->leadership_id = $request->leadership_id;
        $input->save();

        return redirect('/department')->with('success','Boshqarma muvafaqiyatli yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::where('id', $id)->get();
        $leaderships = Leadership::all();
        return view('department.edit',compact('departments', 'leaderships'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'leadership_id' => 'required',
        ]);

        $input = Department::find($id);
        $input->name = $request->name;
        $input->leadership_id = $request->leadership_id;
        $input->save();

        return redirect('/department')->with('success','Boshqarma muvafaqiyatli o\'zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect('/department')->with('success','Boshqarma muvafaqiyatli o\'chirildi');
    }
}
