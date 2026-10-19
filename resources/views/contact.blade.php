@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <h1>Hubungi Kami</h1>
    <p>Form ini masih statis. Fungsi kirim akan dibuat pada pertemuan berikutnya.</p>

    <form class="form" onsubmit="return false;">
        <label for="nama">Nama</label>
        <input type="text" id="nama" placeholder="Nama lengkap">

        <label for="email">Email</label>
        <input type="email" id="email" placeholder="nama@email.com">

        <label for="pesan">Pesan</label>
        <textarea id="pesan" rows="5" placeholder="Tulis pesan..."></textarea>

        <button type="submit" class="btn">Kirim</button>
    </form>
@endsection