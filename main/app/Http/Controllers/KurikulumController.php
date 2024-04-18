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
        $this->authorize('kaprodi');
        return view('kurikulum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('kaprodi');
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
        $this->authorize('kaprodi');
        return view('kurikulum.edit',[
            'data' => $kurikulum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kurikulum $kurikulum)
    {
        $this->authorize('kaprodi');
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
        $this->authorize('kaprodi');

        $check = MataKuliah::where('id_kurikulum', $kurikulum->id_kurikulum)->first();
        if ($check) {
            return redirect('/dashboard/kurikulum')->with('errors', 'Tidak bisa menghapus
            kurikulum yang masih terkait dengan mata kuliah.');
        }

        Kurikulum::destroy($kurikulum->id_kurikulum);
        return redirect('/dashboard/kurikulum')-> with('success','Kurikulum Has Been Deleted',);
    }
}
