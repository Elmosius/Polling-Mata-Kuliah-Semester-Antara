<?php

namespace App\Http\Controllers;

use App\Models\semester;
use App\Http\Requests\StoresemesterRequest;
use App\Http\Requests\UpdatesemesterRequest;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoresemesterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesemesterRequest $request, semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(semester $semester)
    {
        //
    }
}
