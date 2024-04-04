<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\ProgramStudi;
use App\Models\semester;
use Illuminate\Http\Request;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('polling.index',[
            'datas' => Polling::all(),
            'mks' => MataKuliah::all(),
        ]);
//        return redirect('/dashboard/polling-matakuliah-detail');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('polling.create',[
            'data' => Polling::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_polling' => 'required|max:5|unique:polling',
            'start_at' => 'required|date',
            'end_at' => 'required|date',
            'is_active'=> 'required|max:2'
        ]);

        Polling::create($validateData);
        return redirect('/dashboard/polling-matakuliah-detail')-> with('success','Polling Has Been Created',);
    }

    /**
     * Display the specified resource.
     */
    public function show(Polling $polling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Polling $polling)
    {
        return view('polling.edit',[
            'datas' => $polling
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Polling $polling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polling $polling)
    {
        Polling::destroy($polling->id_polling);
        return redirect('/dashboard/polling-matakuliah-detail')-> with('success','Polling Has Been Deleted',);
    }
}
