<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        $team = [
            ['nama' => 'Yohan', 'peran' => 'Frontend Developer'],
            ['nama' => 'Nama Anggota 2', 'peran' => 'UI/UX Designer'],
            ['nama' => 'Nama Anggota 3', 'peran' => 'Backend Developer'],
        ];

        return view('about', compact('team'));
    }

    public function services()
    {
        $services = [
            ['judul' => 'Pembuatan Website', 'deskripsi' => 'Website responsif untuk bisnis dan organisasi.'],
            ['judul' => 'Desain UI/UX', 'deskripsi' => 'Rancangan antarmuka yang rapi dan mudah dipakai.'],
            ['judul' => 'Pengembangan API', 'deskripsi' => 'REST API untuk aplikasi web dan mobile.'],
        ];

        return view('services', compact('services'));
    }

    public function contact()
    {
        return view('contact');
    }
}