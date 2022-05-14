<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasir = User::where('role', 'kasir')->latest()->paginate(150);

        return view('admin.kasir.index', compact('kasir'))
            ->with('i', (request()->input('page', 1) - 1) * 150);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kasir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $request['password'] = bcrypt($request['password']);

        User::create($request->all());

        return redirect()->route('kasir.index')
            ->with('success', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function show(User $kasir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function edit(User $kasir)
    {
        return view('admin.kasir.edit', compact('kasir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manajer  $manajer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $kasir)
    {
        $request->validate([
            'username' => 'required', 'unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        $request['password'] = bcrypt($request['password']);

        $kasir->update($request->all());

        return redirect()->route('kasir.index')
            ->with('success', 'Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $kasir)
    {
        $kasir->delete();

        return redirect()->route('kasir.index')
            ->with('success', 'Delete Success!');
    }
}
