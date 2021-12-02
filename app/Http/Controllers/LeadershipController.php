<?php

namespace App\Http\Controllers;


use App\Models\Leadership;
use Illuminate\Http\Request;

class LeadershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaderships = Leadership::sortable()->paginate(10);
        return view('leadership.index', compact('leaderships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leadership.create');
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
        ]);

        $input = new Leadership();
        $input->name = $request->name;
        $input->save();

        return redirect('/leadership')->with('success','Rahbariyat muvafaqiyatli yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leadership  $leadership
     * @return \Illuminate\Http\Response
     */
    public function show(Leadership $leadership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leadership  $leadership
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leaderships = Leadership::where('id', $id)->get();
        return view('leadership.edit',compact('leaderships'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leadership  $leadership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = Leadership::find($id);
        $input->name = $request->name;
        $input->save();

        return redirect('/leadership')->with('success','Rahbariyat muvafaqiyatli o\'zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leadership  $leadership
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leadership = Leadership::find($id);
        $leadership->delete();
        return redirect('/leadership')->with('success','Rahbariyat muvafaqiyatli o\'chirildi');
    }
}
