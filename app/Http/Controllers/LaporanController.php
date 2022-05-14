<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $transaksi = Transaksi::when($request->search, function ($query) use ($request) {
            $query->where('nama_pelanggan', 'like', "%{$request->search}%");;
        })->orderBy('created_at', 'desc')->paginate(150);

        $transaksi->appends($request->only('search'));

        if (request()->filter) {
            $filter = Carbon::parse(request()->filter)->toDateTimeString();
            $transaksi = Transaksi::with('menu')->where('tgl', '=', "{$filter}")->orderBy('created_at', 'desc')->paginate(150);
        } else {
            $data = Transaksi::latest()->with('menu')->get();
        }

        return view('manajer.laporan.index', compact('transaksi'))
            ->with('i', (request()->input('page', 1) - 1) * 150);
    }
}
