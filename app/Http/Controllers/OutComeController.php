<?php

namespace App\Http\Controllers;

use App\Models\OutCome;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class OutComeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  OutCome::with(['user','updatedby'])->get();
        // dd($data[0]);
        return view('web.pages.outcome.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.pages.outcome.create');

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
            'title' => 'required|max:255',
            'info' => 'max:1000',
            'outcome' => 'required|integer',
        ]);
        OutCome::create($request->all() + ['username' => auth()->user()->id]);

        return redirect()->back()->with('success', 'Add new Outcome successfuly !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutCome  $outCome
     * @return \Illuminate\Http\Response
     */
    public function show(OutCome $outCome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutCome  $outCome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = OutCome::findOrFail($id);
        return view('web.pages.outcome.update', ['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OutCome  $outCome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $outcome = OutCome::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'info' => 'max:1000',
            'outcome' => 'required|integer',
        ]);
        $data = $request->all() + ['updated_by' =>auth()->user()->id];
        $outcome->update($data);
 
        return redirect()->back()->with('success', 'Updated Outcome successfuly !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutCome  $outCome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OutCome::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Out Come successfuly !');
    }
}
