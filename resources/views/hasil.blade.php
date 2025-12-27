@extends('layout.app')
@section('title','Hasil Perhitungan')
@section('content')
  <h2>Hasil Perhitungan</h2>
  <table class="table">
    <tr><th>Nama Menu</th><td>{{ $data['nama_menu'] ?? '-' }}</td></tr>
    <tr><th>Harga Bahan</th><td>Rp {{ number_format($data['harga_bahan'],0,',','.') }}</td></tr>
    <tr><th>Harga Jual</th><td>Rp {{ number_format($data['harga_jual'],0,',','.') }}</td></tr>
    <tr><th>Jumlah</th><td>{{ $data['jumlah'] }}</td></tr>
    <tr><th>Modal</th><td>Rp {{ number_format($modal,0,',','.') }}</td></tr>
    <tr><th>Pendapatan</th><td>Rp {{ number_format($pendapatan,0,',','.') }}</td></tr>
    <tr><th>Keuntungan</th><td>Rp {{ number_format($keuntungan,0,',','.') }}</td></tr>
  </table>

  <form action="{{ route('kalkulator.simpan') }}" method="POST">
    @csrf
    <input type="hidden" name="nama_menu" value="{{ $data['nama_menu'] ?? '' }}">
    <input type="hidden" name="harga_bahan" value="{{ $data['harga_bahan'] }}">
    <input type="hidden" name="harga_jual" value="{{ $data['harga_jual'] }}">
    <input type="hidden" name="jumlah" value="{{ $data['jumlah'] }}">
    <input type="hidden" name="modal" value="{{ $modal }}">
    <input type="hidden" name="pendapatan" value="{{ $pendapatan }}">
    <input type="hidden" name="keuntungan" value="{{ $keuntungan }}">
    <button type="submit" class="btn btn-primary">Simpan ke Laporan</button>
    <a href="{{ route('kalkulator.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
@endsection
