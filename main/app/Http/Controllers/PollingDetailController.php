<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use Illuminate\Http\Request;

class PollingDetailController extends Controller
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
    }

    public function results()
    {
        return view('polling.index',[
            'datas' => Polling::all(),
            'mks' => MataKuliah::all(),
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
        $validateData = $request->validate([
            'id_polling' => 'required',
            'id_mataKuliah' => 'required|array',
        ]);

        $validateData['id_user'] = auth()->user()->id_user;

        foreach ($validateData['id_mataKuliah'] as $id_mataKuliah) {
            PollingDetail::create([
                'id_polling' => $validateData['id_polling'],
                'id_user' => $validateData['id_user'],
                'id_mataKuliah' => $id_mataKuliah,
            ]);
        }
        return redirect('/dashboard/polling-matakuliah-detail')-> with('success','Polling Berhasil!',);
    }

    /**
     * Display the specified resource.
     */
    public function show(PollingDetail $pollingDetail)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PollingDetail $pollingDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PollingDetail $pollingDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PollingDetail $pollingDetail)
    {
        //
    }
}
