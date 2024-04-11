<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use App\Models\semester;
use Illuminate\Http\Request;

class PollingDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index', [
            'datas' => PollingDetail::with(['users', 'polling', 'mataKuliah'])->get(),
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

        $totalSKS = 0;
        foreach ($validateData['id_mataKuliah'] as $id_mataKuliah) {
            $mk = MataKuliah::find($id_mataKuliah);
            $totalSKS += $mk->sks;
        }

        if ($totalSKS > 9) {
            return redirect('/dashboard/polling')->with('errors', 'Total SKS tidak boleh lebih dari 9');
        }

        $validateData['id_user'] = auth()->user()->id_user;
        foreach ($validateData['id_mataKuliah'] as $id_mataKuliah) {
            PollingDetail::create([
                'id_polling' => $validateData['id_polling'],
                'id_user' => $validateData['id_user'],
                'id_mataKuliah' => $id_mataKuliah,
            ]);
        }
        return redirect('/dashboard/polling')->with('success', 'Polling Berhasil!',);
    }

    public function detailHasil($id_polling, $id_mataKuliah)
    {
        $pollingDetail = PollingDetail::where('id_polling', $id_polling)
            ->where('id_mataKuliah', $id_mataKuliah)
            ->get();

        return view('polling.hasil-detail', [
            'datas' => $pollingDetail,
        ]);
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
