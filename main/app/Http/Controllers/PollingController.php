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
            'data' => Polling::all(),
            'mks' => MataKuliah::all(),
            'semester' => semester::all(),
            'ps' => ProgramStudi::all(),
            'kurikulum' => Kurikulum::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            'data' => Polling::all(),
            'mks' => MataKuliah::all(),
            'semester' => semester::all(),
            'ps' => ProgramStudi::all(),
            'kurikulum' => Kurikulum::all()
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
        //
    }
}
