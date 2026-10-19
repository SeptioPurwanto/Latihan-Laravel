@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero">
        <h1>Selamat Datang di FrontPage</h1>
        <p>Ini adalah project Laravel pertama kami. Halaman ini dibuat dengan Blade dan dihubungkan lewat routing.</p>
        <a href="{{ route('services') }}" class="btn">Lihat Layanan</a>
    </section>
@endsection