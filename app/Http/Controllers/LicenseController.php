<?php

namespace App\Http\Controllers;

use App\Models\License;
use Carbon\Carbon;
use Illuminate\Http\Request;


class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'from' => 'required|date|after_or_equal:' . date('Y-m-d'),
            'to' => 'required|date|after:from',
            'employee' => 'required|exists:employees,id'
        ]);
        $isLis = License::where('employee', $request->employee)->orderBy('id', 'DESC')->first();

        if (!is_null($isLis)) {
            if (strtotime($request->from) > strtotime($isLis->to)) {
                $from = date_create($request->from);
                $to = date_create($request->to);
                $diff = date_diff($from, $to);
                License::create($request->all() + ['username' => auth()->user()->id] + ['day' => $diff->format("%a")]);
                return redirect()->back()->with('success', 'Add License successfuly !');
            } else {
                return  redirect()->back()->with('error', 'Error Time Selection !');
            }
        } else {
            $from = date_create($request->from);
            $to = date_create($request->to);
            $diff = date_diff($from, $to);
            License::create($request->all() + ['username' => auth()->user()->id] + ['day' => $diff->format("%a")]);
            return redirect()->back()->with('success', 'Add License successfuly !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\License  $license
     * @return \Illuminate\Http\Response
     */
    public function show(License $license)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\License  $license
     * @return \Illuminate\Http\Response
     */
    public function edit(License $license)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\License  $license
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, License $license)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\License  $license
     * @return \Illuminate\Http\Response
     */
    public function destroy(License $license)
    {

        $license->delete();
        return redirect()->back()->with('success', 'Deleted License successfuly !');

    }
}
