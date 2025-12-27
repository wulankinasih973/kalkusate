<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    // Menampilkan halaman laporan dengan filter tanggal
    public function index(Request $request)
    {
        $query = Laporan::query();

        // Filter range tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal', [$request->start_date, $request->end_date]);
        }

        $laporans = $query->orderBy('tanggal', 'desc')->paginate(20)
                            ->withQueryString(); // agar pagination tetap menyertakan filter

        return view('laporan', compact('laporans'));
    }

    // Hapus data laporan
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return back()->with('success', 'Data laporan dihapus.');
    }

    // Export PDF dengan filter tanggal
    public function exportPdf(Request $request)
    {
        $query = Laporan::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal', [$request->start_date, $request->end_date]);
        }

        $laporans = $query->orderBy('tanggal', 'desc')->get();

        $pdf = Pdf::loadView('laporan_pdf', compact('laporans'));

        $fileName = 'laporan_keuntungan_' . date('Ymd_His') . '.pdf';
        return $pdf->download($fileName);
    }

    // Export CSV dengan filter tanggal
    public function exportCsv(Request $request)
    {
        $fileName = 'laporan_keuntungan_' . date('Ymd_His') . '.csv';

        $query = Laporan::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal', [$request->start_date, $request->end_date]);
        }

        $laporans = $query->orderBy('tanggal', 'desc')
                          ->get(['tanggal', 'nama_menu', 'modal', 'pendapatan', 'keuntungan']);

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $callback = function() use ($laporans) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Tanggal', 'Menu', 'Modal', 'Pendapatan', 'Keuntungan']);
            foreach ($laporans as $laporan) {
                fputcsv($handle, [
                    $laporan->tanggal,
                    $laporan->nama_menu,
                    $laporan->modal,
                    $laporan->pendapatan,
                    $laporan->keuntungan
                ]);
            }
            fclose($handle);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}
