<?php

namespace App\Http\Controllers;


use App\Calculator;
use App\Models\Kpi;
use App\Models\Worker;
use App\Models\Section;
use App\Models\Department;
use App\Models\Leadership;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class CalculatorController extends Controller
{
       /**
     * Display the calculator form.
     *
     * @param  Calculator $calculator
     * @return View
     * @throws ValidationException
     */
    public function index(Calculator $calculator)
    {
        $kpis = Kpi::sortable()->paginate(10);
        $workers = Worker::all();
        $sections = Section::all();
        $departments = Department::all();
        $leaderships = Leadership::all();
        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        return view('kpi.index', compact(
            'kpis',
            'workers',
            'sections',
            'departments',
            'leaderships',
            'a', 'b', 'c', 'd'
        ));

    }

    /**
     * Process the form request and display the result along with the calculator form.
     *
     * @param  Calculator $calculator
     * @return View
     */
    public function calculate(Calculator $calculator)
    {
        $this->validate(request(), [
            'leadership' => ['required'],
            'department' => ['required'],
            'section' => ['required'],
            'speciality' => ['required'],
            'worker' => ['required'],
            'a' => ['required', 'integer'],
            'b' => ['required', 'integer'],
            'c' => ['required', 'integer'],
            'd' => ['required', 'integer'],
        ]);

        $a = request()->input('a');
        $b = request()->input('b');
        $c = request()->input('c');
        $d = request()->input('d');
        $total = $calculator->all($a, $b, $c, $d);
        $kpi_per = $calculator->percent($a, $b, $c, $d);

        $information = new Kpi();
        $information->leadership = request()->input('leadership');
        $information->department = request()->input('department');
        $information->section = request()->input('section');
        $information->speciality = request()->input('speciality');
        $information->worker = request()->input('worker');
        $information->done = $a;
        $information->executive_discipline = $b;
        $information->initiative =$c;
        $information->extra=$d;
        $information->total = $total;
        $information->kpi_per = $kpi_per;
        $information->save();

        return redirect('/calculator')->with('success','Malumot muvafaqiyatli kiritildi');
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kpi  $information
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $informations = Kpi::sortable()->paginate(10);
        return view('information.index', compact('informations'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kpi  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Kpi::find($id);
        $information->delete();
        return redirect('/information')->with('success','Malumot muvafaqiyatli o\'chirildi');
    }
}
