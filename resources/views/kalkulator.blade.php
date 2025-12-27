@extends('layout.app')

@section('title','Kalkulator')

{{-- Loading Screen --}}
@section('loading')
<div id="loading-screen" class="loading-screen">
    <img src="{{ asset('images/maskot-loading.png') }}" 
         alt="Loading..." 
         class="loading-maskot">

    <p class="loading-text">Siap membantu menghitung...</p>
</div>

<script>
    window.addEventListener("load", function () {
        const load = document.getElementById('loading-screen');
        setTimeout(() => {
            load.style.opacity = "0";
            load.style.transition = "0.6s ease";
            setTimeout(() => load.style.display = "none", 600);
        }, 300);
    });
</script>

<style>
.loading-screen {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: #f6e7d8;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 2000;
    gap: 28px !important;   /* JARAK MASKOT <-> TEKS */
}

.loading-maskot {
    width: 170px;
    animation: float 1.6s ease-in-out infinite;
}

.loading-text {
    margin: 0 !important;  /* reset margin bawaan <p> */
    font-size: 18px;
    color: #5a4635;
    font-weight: 600;
}

/* Animasi maskot */
@keyframes float {
  0% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
  100% { transform: translateY(0); }
}
</style>
@endsection


{{-- KONTEN --}}
@section('content')
  <h2 class="fw-bold mb-4" style="color:#5a4635;">Kalkulator Keuntungan Penjualan</h2>

  <form action="{{ route('kalkulator.hitung') }}" method="POST">
    @csrf
    
    <div class="mb-3">
      <label class="form-label">Nama Menu (opsional)</label>
      <input type="text" name="nama_menu" class="form-control" 
             value="{{ old('nama_menu') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Harga Bahan (Rp)</label>
      <input type="number" name="harga_bahan" class="form-control" required
             value="{{ old('harga_bahan') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Harga Jual (Rp)</label>
      <input type="number" name="harga_jual" class="form-control" required
             value="{{ old('harga_jual') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Jumlah Terjual</label>
      <input type="number" name="jumlah" class="form-control" required
             value="{{ old('jumlah', 1) }}">
    </div>

    <button class="btn btn-primary">Hitung</button>
  </form>
@endsection
