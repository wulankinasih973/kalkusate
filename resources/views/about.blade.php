@extends('layout.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="text-center mb-5" data-aos="fade-down">
    <h1 class="fw-bold">Tentang Warung Sate Mang Ipin & Pengembang Website</h1>
    <p class="lead">Profil singkat UMKM dan mahasiswa pengembang website</p>
</div>

<div class="row align-items-center mb-5">
    <div class="col-md-5 text-center" data-aos="fade-right">
        <img src="{{ asset('images/1.jpg') }}" alt="Warung Sate Mang Ipin" 
             class="img-fluid rounded shadow mb-3" style="max-height: 300px;">
    </div>
    <div class="col-md-7" data-aos="fade-left">
        <h3 class="fw-semibold mb-3">Profil Warung Sate Mang Ipin</h3>
        <p>
            <strong>Warung Sate Mang Ipin</strong> adalah salah satu UMKM lokal yang 
            menjual sate dan gulai kambing dengan cita rasa khas bumbu kacang dan rempah-rempah. 
            Didirikan sejak tahun 1987, salah satu menu favorit yang wajib dicoba di Sate Suka Mulya Mang Ipin adalah sate kambing. Daging kambing yang digunakan adalah kambing muda.
        </p>
        <p>
            Pengalaman bertahun-tahun dalam memasak sate, menjadikan warung ini sebagai tempat yang sangat terpercaya untuk menikmati hidangan yang luar biasa.
            Selain sate kambing, Sate Suka Mulya Mang Ipin juga menyediakan sate ayam kampung dan gulai kambing yang tak kalah lezatnya.
        </p>
        
        <ul class="list-unstyled">
            <li><strong>Alamat:</strong> Jalan Raya Padang Jaya, Jatinegara, Padangjaya, Kec. Majenang, Kabupaten Cilacap, Jawa Tengah 53257</li>
            <li><strong>Jam Operasional:</strong> 07.00 - 21.00 WIB</li>
            <li><strong>Kontak:</strong> (0280) 621936</li>
        </ul>
    </div>
</div>

<hr class="my-5" data-aos="zoom-in">

<div class="row align-items-center">
    <div class="col-md-4 text-center" data-aos="fade-up-right">
        <img src="{{ asset('images/5.jpg') }}" alt="Profil Pengembang" 
             class="img-fluid rounded-circle shadow mb-3" style="max-height: 220px;">
    </div>
    <div class="col-md-8" data-aos="fade-up-left">
        <h3 class="fw-semibold mb-3">Profil Pengembang Website</h3>
        <p>
            Website ini dikembangkan oleh seorang mahasiswa yang sedang melaksanakan 
            <strong>Praktik Kerja Lapangan (PKL)</strong> di Warung Sate Mang Ipin 
            sebagai bagian dari kegiatan akademik di semester 7.
        </p>
        <p>
            Tujuan utama proyek ini adalah untuk membantu proses pencatatan dan 
            perhitungan keuntungan penjualan agar lebih mudah, cepat, dan terstruktur 
            menggunakan teknologi web berbasis <strong>Laravel</strong>.
        </p>
        <ul class="list-unstyled">
            <li><strong>Nama:</strong> Wulan Kinasih</li>
            <li><strong>Universitas:</strong> Universitas Teknologi Digital Indonesia</li>
            <li><strong>Program Studi:</strong> Informatika</li>
            <li><strong>Tahun:</strong> 2025</li>
        </ul>
        <p>
            Pengembangan website ini diharapkan dapat menjadi langkah awal dalam mendukung 
            digitalisasi UMKM dan sebagai bentuk kontribusi nyata mahasiswa terhadap dunia usaha kecil menengah.
        </p>
    </div>
</div>
@endsection
