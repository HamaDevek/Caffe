<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\License;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Employee::get();

        return view('web.pages.employee.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.pages.employee.create');
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
            'name' => 'required|max:255',
            'phone' => 'required|max:11|min:11|unique:employees,phone',
            'salary' => 'required|numeric',
            'time' => 'required|in:day,night,both',
        ]);
        Employee::create($request->all() + ['username' => Auth::user()->id]);

        return redirect()->back()->with('success', 'Add new employee successfuly !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return redirect(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $em = $employee->with(['license.user','salary'])->whereId($employee->id)->first();
        $license = count($em->license);
        $salary = $em->license->sum('salary');
        $days = $em->license->sum('day');
        return view('web.pages.employee.update', ['data' => $em,'salary'=>$salary ,'license'=>$license ,'days'=>$days]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:11|min:11|unique:employees,phone,' . $employee->id,
            'salary' => 'required|numeric',
            'time' => 'required|in:day,night,both',
        ]);
        $data = $request->all() + ['username' => Auth::user()->id];
        $data['state'] =  isset($data['state']) ? true : false;
        $employee->update($data);
        return redirect()->back()->with('success', 'Updated employee successfuly !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back()->with('success', 'Deleted employee successfuly !');
    }
}
