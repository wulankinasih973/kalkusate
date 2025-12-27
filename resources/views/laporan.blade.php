@extends('layout.app')
@section('title','Laporan')

@section('content')

<div class="container py-3">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-3">
        <h2 class="m-0">Laporan Keuntungan</h2>

        {{-- Tombol Export --}}
        <div class="d-flex flex-column flex-sm-row gap-2">
            <a href="{{ route('laporan.exportPdf') }}" class="btn btn-theme-pdf btn-sm">Export PDF</a>
            <a href="{{ route('laporan.export.csv') }}" class="btn btn-theme-csv btn-sm">Export CSV</a>
        </div>
    </div>

    {{-- Filter Range Tanggal --}}
    <form method="GET" action="{{ route('laporan.index') }}" class="row g-2 mb-3">
        <div class="col-12 col-md-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" id="start_date" name="start_date" class="form-control"
                value="{{ request('start_date') }}">
        </div>

        <div class="col-12 col-md-3">
            <label for="end_date" class="form-label">Tanggal Selesai</label>
            <input type="date" id="end_date" name="end_date" class="form-control"
                value="{{ request('end_date') }}">
        </div>

        <div class="col-12 col-md-3 align-self-end">
            <button class="btn btn-primary w-90">Filter</button>
        </div>
    </form>

    {{-- Table Responsive --}}
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Menu</th>
                    <th>Pendapatan</th>
                    <th>Modal</th>
                    <th>Keuntungan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporans as $lap)
                <tr>
                    <td>{{ $lap->tanggal->format('Y-m-d') }}</td>
                    <td>{{ $lap->nama_menu }}</td>
                    <td>Rp {{ number_format($lap->pendapatan,0,',','.') }}</td>
                    <td>Rp {{ number_format($lap->modal,0,',','.') }}</td>
                    <td>Rp {{ number_format($lap->keuntungan,0,',','.') }}</td>
                    <td>
                        <form action="{{ route('laporan.destroy', $lap->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    {{ $laporans->links() }}

</div>

@endsection
