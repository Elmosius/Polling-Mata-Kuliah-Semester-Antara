<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kurikulum.index',[
            'data' => Kurikulum::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kurikulum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tahun' => 'required|max:4'
        ]);

        Kurikulum::create($validateData);
        return redirect('/dashboard/kurikulum')-> with('success','Kurikulum Has Been Created',);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kurikulum $kurikulum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kurikulum $kurikulum)
    {
        return view('kurikulum.edit',[
            'data' => $kurikulum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kurikulum $kurikulum)
    {
        $validateData = $request->validate([
            'tahun' => 'required|max:4',
        ]);

        $kurikulum->update($validateData);
        return redirect('/dashboard/kurikulum')-> with('success','Kurikulum Has Been Created',);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kurikulum $kurikulum)
    {
        Kurikulum::destroy($kurikulum->id_kurikulum);
        return redirect('/dashboard/kurikulum')-> with('success','Kurikulum Has Been Deleted',);
    }
}
