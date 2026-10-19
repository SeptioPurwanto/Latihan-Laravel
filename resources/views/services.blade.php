@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
    <h1>Layanan Kami</h1>
    <div class="grid">
        @foreach ($services as $layanan)
            <div class="card">
                <h3>{{ $layanan['judul'] }}</h3>
                <p>{{ $layanan['deskripsi'] }}</p>
            </div>
        @endforeach
    </div>
@endsection