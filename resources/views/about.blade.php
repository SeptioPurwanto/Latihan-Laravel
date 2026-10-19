@extends('layouts.app')

@section('title', 'Tentang')

@section('content')
    <h1>Tentang Kami</h1>
    <p>Kami adalah tim yang sedang belajar membangun aplikasi fullstack dengan Laravel.</p>

    <h2>Tim</h2>
    <div class="grid">
        @foreach ($team as $anggota)
            <div class="card">
                <h3>{{ $anggota['nama'] }}</h3>
                <p>{{ $anggota['peran'] }}</p>
            </div>
        @endforeach
    </div>
@endsection