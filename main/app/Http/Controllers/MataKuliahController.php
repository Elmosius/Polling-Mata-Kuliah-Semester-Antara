<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use App\Models\semester;
use App\Models\User;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('matakuliah.index',[
            'data' => MataKuliah::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create',[
            'semester' => semester::all(),
            'ps' => ProgramStudi::all(),
            'kurikulum' => Kurikulum::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_mataKuliah' => 'required|max:10|unique:mata_kuliah',
            'nama_mataKuliah' => 'required|max:45',
            'sks' => 'required|min:1|max:4',
            'id_semester'=> 'required',
            'id_program_studi' => 'required',
            'id_kurikulum' => 'required'
        ]);

        MataKuliah::create($validateData);
        return redirect('/dashboard/mata-kuliah')-> with('success','Mata kuliah Has Been Created',);
    }

    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mataKuliah)
    {
        return view('matakuliah.edit',[
            'mk' => $mataKuliah,
            'semester' => semester::all(),
            'ps' => ProgramStudi::all(),
            'kurikulum' => Kurikulum::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $validateData = $request->validate([
            'id_mataKuliah' => 'required|max:10|unique:mata_kuliah',
            'nama_mataKuliah' => 'required|max:45',
            'sks' => 'required|min:1|max:4',
            'id_semester'=> 'required',
            'id_program_studi' => 'required',
            'id_kurikulum' => 'required'
        ]);

        $mataKuliah->update($validateData);
        return redirect('/dashboard/mata-kuliah')->with('success', 'Mata kuliah Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $mataKuliah)
    {
        MataKuliah::destroy($mataKuliah->id_mataKuliah);
        return redirect('/dashboard/mata-kuliah')-> with('success','Mata kuliah Has Been Deleted',);
    }
}
