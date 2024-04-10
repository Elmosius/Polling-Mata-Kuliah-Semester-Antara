<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index',[
            'data' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin');
        return view('user.create',[
            'data' => User::all(),
            'roles' => Role::all(),
            'kode_ps' => ProgramStudi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $validateData = $request->validate([
            'id_user' => 'required|max:5|unique:users',
            'nama_user' => 'required|max:45',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:25',
            'id_role' => 'required',
            'id_program_studi' => 'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        return redirect('/dashboard/users')-> with('success','New Account Has Been Created',);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('admin');
        return view('user.edit',[
            'datas' => $user,
            'roles' => Role::all(),
            'kode_ps' => ProgramStudi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('admin');
        User::destroy($user->id_user);
        return redirect('/dashboard/users')-> with('success','Account Has Been Deleted',);
    }
}
