<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManajerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manajer = User::where('role', 'manajer')->latest()->paginate(150);

        return view('admin.manajer.index', compact('manajer'))
            ->with('i', (request()->input('page', 1) - 1) * 150);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manajer.create');
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

        return redirect()->route('manajer.index')
            ->with('success', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manajer  $manajer
     * @return \Illuminate\Http\Response
     */
    public function show(User $kasir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manajer  $manajer
     * @return \Illuminate\Http\Response
     */
    public function edit(User $manajer)
    {
        return view('admin.manajer.edit', compact('manajer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manajer  $manajer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $manajer)
    {
        $request->validate([
            'username' => 'required', 'unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        $request['password'] = bcrypt($request['password']);

        $manajer->update($request->all());

        return redirect()->route('manajer.index')
            ->with('success', 'Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manajer  $manajer
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $manajer)
    {
        $manajer->delete();

        return redirect()->route('manajer.index')
            ->with('success', 'Delete Success!');
    }
}
