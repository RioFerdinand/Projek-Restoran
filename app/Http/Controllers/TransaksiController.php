<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Menu;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('menu')->where('nama_pegawai', auth()->user()->username)->paginate(150);

        return view('kasir.transaksi.index', compact('transaksi'))
            ->with('i', (request()->input('page', 1) - 1) * 150);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        return view('kasir.transaksi.create', compact('menu', $menu));
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
            'nama_pelanggan' => 'required',
            'menu_id' => 'required',
            'jumlah' => 'required',
            'nama_pegawai' => 'required',
            'tgl' => 'required',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Add Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manajer  $manajer
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manajer  $manajer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $menu = Menu::all();
        return view('kasir.transaksi.edit', compact('transaksi', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manajer  $manajer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'menu_id' => 'required',
            'jumlah' => 'required',
            'nama_pegawai' => 'required',
            'tgl' => 'required',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manajer  $manajer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Delete Success!');
    }
}
