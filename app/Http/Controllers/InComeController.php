<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\InCome;
use App\Models\OutCome;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class InComeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = InCome::get();
        return view('web.pages.income.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $income = InCome::whereDate('created_at', Carbon::today())->first();

        if (is_null($income)) {


            $outcome = OutCome::whereDate('created_at', Carbon::today())->get();
            $sumoutcome = $outcome->sum('outcome');
            $employee = Employee::with(['license'])->get();

            $employee_is_license = [];
            foreach ($employee as $keys => $values) {
                if (isset($values->license)) {
                    foreach ($values->license as $key => $value) {
                        $currentDate = date('Y-m-d', strtotime(date('Y-m-d')));
                        $startDate = date('Y-m-d', strtotime($value->from));
                        $endDate = date('Y-m-d', strtotime($value->to));
                        if (($currentDate >= $startDate) && ($currentDate <= $endDate)) {
                            array_push($employee_is_license, $values->id);
                            break;
                        }
                    }
                }
            }
            $new_employee = Employee::whereNotIn('id', $employee_is_license)->get();
            $all_outcome  = $new_employee->sum('salary') + $sumoutcome;


            return view('web.pages.income.create', ['employee' => $new_employee, 'outcome' => $outcome, 'all_outcome' => $all_outcome]);
        }

        return redirect()->back()->with('error', 'You Added Income for today !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'income' => 'required|integer',
        ]);
        $income = InCome::whereDate('created_at', Carbon::today())->first();
        if (isset($income)) {
            return redirect()->back()->with('error', 'Added Income for today !');
        }

        $employee = Employee::with(['license'])->get();
        $employee_is_license = [];
        foreach ($employee as $keys => $values) {
            if (isset($values->license)) {
                foreach ($values->license as $key => $value) {
                    $currentDate = date('Y-m-d', strtotime(date('Y-m-d')));
                    $startDate = date('Y-m-d', strtotime($value->from));
                    $endDate = date('Y-m-d', strtotime($value->to));
                    if (($currentDate >= $startDate) && ($currentDate <= $endDate)) {
                        array_push($employee_is_license, $values);
                        break;
                    }
                }
            }
        }
        $new_employee = Employee::whereNotIn('id', $employee_is_license)->get();

        foreach ($new_employee as $key => $value) {
            Salary::create(['salary' =>  $value->salary,'employee' =>  $value->id,'username' => auth()->user()->id]);
        }
       $in = InCome::create($request->all() + ['username' => auth()->user()->id]);
        return redirect()->route('income.show',$in->id)->with('success', 'Add new Income successfuly !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InCome  $inCome
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $income = InCome::findOrFail($id);
        $outcome = OutCome::whereDate('created_at', $income->created_at)->get();
        $sumoutcome = $outcome->sum('outcome');
        $employee = Employee::with(['license'])->get();

        $employee_is_license = [];
        foreach ($employee as $keys => $values) {
            if (isset($values->license)) {
                foreach ($values->license as $key => $value) {
                    $currentDate = date('Y-m-d', strtotime($income->created_at));
                    $startDate = date('Y-m-d', strtotime($value->from));
                    $endDate = date('Y-m-d', strtotime($value->to));
                    if (($currentDate >= $startDate) && ($currentDate <= $endDate)) {
                        array_push($employee_is_license, $values->id);
                        break;
                    }
                }
            }
        }
        $new_employee = Employee::whereNotIn('id', $employee_is_license)->get();
        $all_outcome  = $new_employee->sum('salary') + $sumoutcome;
        $all_salary = $new_employee->sum('salary');
        $avarage = $income->income -  $all_outcome;
        return view('web.pages.income.show', ['employee' => $new_employee, 'outcome' => $outcome, 'all_outcome' => $all_outcome,'avarage' => $avarage,'incomes'=>$income,'all_salary'=>$all_salary]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InCome  $inCome
     * @return \Illuminate\Http\Response
     */
    public function edit(InCome $inCome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InCome  $inCome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InCome $inCome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InCome  $inCome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income = InCome::findOrFail($id);
        $salary = Salary::whereDate('created_at', $income->created_at)->delete();
        $income->delete();
        return redirect()->back()->with('success', 'Deleted Income With Salary successfuly !');


    }
}
