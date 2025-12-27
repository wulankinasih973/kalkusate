<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Carbon\Carbon;

class KalkulatorController extends Controller
{
    public function index()
    {
        return view('kalkulator');
    }

    public function hitung(Request $request)
    {
        $data = $request->validate([
            'nama_menu' => 'nullable|string|max:255',
            'harga_bahan' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'jumlah' => 'required|integer|min:0',
        ]);

        $modal = (int)$data['harga_bahan'] * (int)$data['jumlah'];
        $pendapatan = (int)$data['harga_jual'] * (int)$data['jumlah'];
        $keuntungan = $pendapatan - $modal;

        return view('hasil', compact('data', 'modal', 'pendapatan', 'keuntungan'));
    }

    public function simpan(Request $request)
    {
        $data = $request->validate([
            'nama_menu' => 'nullable|string|max:255',
            'harga_bahan' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'jumlah' => 'required|integer|min:0',
            'modal' => 'required|numeric',
            'pendapatan' => 'required|numeric',
            'keuntungan' => 'required|numeric',
            'tanggal' => 'nullable|date',
        ]);

        $tanggal = $data['tanggal'] ?? Carbon::now()->toDateString();

        Laporan::create([
            'tanggal' => $tanggal,
            'nama_menu' => $data['nama_menu'] ?? '-',
            'harga_bahan' => $data['harga_bahan'],
            'harga_jual' => $data['harga_jual'],
            'jumlah' => $data['jumlah'],
            'modal' => $data['modal'],
            'pendapatan' => $data['pendapatan'],
            'keuntungan' => $data['keuntungan'],
        ]);

        return redirect()->route('laporan.index')->with('success', 'Hasil perhitungan berhasil disimpan.');
    }
}
