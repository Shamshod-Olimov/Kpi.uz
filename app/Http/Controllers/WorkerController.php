<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\Section;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();
        $items = Section::all();
        return view('worker.index', compact('workers','items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Section::all();
        return view('worker.create', compact('items'));
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
            'section_id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'status' => 'required',
            'speciality' => 'required',
        ]);

        $input = new Worker();
        $input->section_id = $request->section_id;
        $input->name = $request->name;
        $input->surname = $request->surname;
        $input->status = $request->status;
        $input->speciality = $request->speciality;
        $input->save();

        return redirect('/worker')->with('success','Xodim muvafaqiyatli kiritildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workers = Worker::where('id', $id)->get();
        $items = Section::all();
        return view('worker.edit',compact('workers','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'section_id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'status' => 'required',
            'speciality' => 'required',
        ]);

        $input = Worker::find($id);
        $input->section_id = $request->section_id;
        $input->name = $request->name;
        $input->surname = $request->surname;
        $input->status = $request->status;
        $input->speciality = $request->speciality;
        $input->save();

        return redirect('/worker')->with('success','Xodim muvafaqiyatli o\'zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);
        $worker->delete();
        return redirect('/calculator')->with('success','Xodim muvafaqiyatli o\'chirildi');
    }
}
