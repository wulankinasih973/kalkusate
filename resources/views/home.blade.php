@extends('layout.app')

@section('title', 'Beranda')

@section('content')

<div class="container py-4">

    {{-- Hero Section --}}
    <div class="row align-items-center g-4" data-aos="fade-up">

        {{-- Gambar Hero --}}
        <div class="col-12 col-md-6 text-center" data-aos="zoom-in">
            <img src="{{ asset('images/1.jpg') }}" alt="Warung Sate Mang Ipin"
                 class="img-fluid rounded shadow-lg"
                 style="max-height:350px; object-fit:cover; width:100%;">
        </div>

        {{-- Teks Hero --}}
        <div class="col-12 col-md-6" data-aos="fade-left" data-aos-delay="100">
            <h1 class="fw-bold mb-3 text-center text-md-start">
                Warung Sate Suka Mulya Mang Ipin
            </h1>

            <p>
                <strong>Warung Sate Mang Ipin</strong> adalah salah satu UMKM lokal yang menjual sate
                dan gulai kambing dengan cita rasa khas bumbu kacang dan rempah-rempah.
            </p>
            <p>
                Warung ini kini melakukan digitalisasi pencatatan keuangan melalui aplikasi
                <strong>KalkuSate</strong> untuk menghitung pendapatan & keuntungan harian secara cepat dan akurat.
            </p>

            <ul class="list-unstyled small">
                <li><strong>Alamat:</strong> Jalan Raya Padang Jaya, Jatinegara, Majenang, Cilacap</li>
                <li><strong>Jam Operasional:</strong> 07.00 - 21.00 WIB</li>
                <li><strong>Kontak:</strong> (0280) 621936</li>
            </ul>

            <div class="text-center text-md-start">
                <a href="{{ route('kalkulator.index') }}"
                   class="btn btn-primary mt-3 px-4 py-2"
                   data-aos="zoom-in" data-aos-delay="200">
                    Mulai Hitung Keuntungan
                </a>
            </div>
        </div>

    </div>

    {{-- Gallery --}}
    <div class="mt-5" data-aos="fade-up">
        <h4 class="fw-semibold mb-4 text-center">Galeri</h4>

        <div class="row g-4">

            <div class="col-6 col-md-4 text-center" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('images/2.jpg') }}" class="img-fluid rounded shadow-sm" alt="Sate Ayam">
                <p class="mt-2 small">Sate Ayam Kacang</p>
            </div>

            <div class="col-6 col-md-4 text-center" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('images/3.jpg') }}" class="img-fluid rounded shadow-sm" alt="Sate Kambing">
                <p class="mt-2 small">Sate Kambing Bumbu Kecap</p>
            </div>

            <div class="col-6 col-md-4 text-center" data-aos="zoom-in" data-aos-delay="300">
                <img src="{{ asset('images/4.jpg') }}" class="img-fluid rounded shadow-sm" alt="Bagian Warung">
                <p class="mt-2 small">Kondisi bagian dalam warung</p>
            </div>

        </div>
    </div>

    <hr class="my-5">

    {{-- Tentang Website --}}
    <div class="text-center px-2" data-aos="fade-up">
        <h3 class="fw-semibold mb-3">Tentang Website</h3>
        <p>
            Website ini dibuat sebagai bagian dari kegiatan <strong>Praktik Kerja Lapangan (PKL)</strong>
            yang bertujuan mendukung digitalisasi pencatatan keuangan di Warung Sate Mang Ipin.
            Aplikasi ini membantu pemilik mengelola modal, pendapatan, dan menghitung keuntungan setiap menu.
        </p>
    </div>

</div>

@endsection
