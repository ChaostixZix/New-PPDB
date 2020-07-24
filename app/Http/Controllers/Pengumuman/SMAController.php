<?php

namespace App\Http\Controllers\Pengumuman;

use App\Data\SMA;
use App\Http\Controllers\Controller;
use App\Pendaftar\SMA\Afirmasi;
use App\Pendaftar\SMA\PindahTugas;
use App\Pendaftar\SMA\Prestasi;
use App\Pendaftar\SMA\Zonasi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SMAController extends Controller
{
    public function index()
    {
        $sma = (new SMA())->getAll();
        return Inertia::render('Pengumuman/SMA/ListSMA',
        [
            'sma' => $sma
        ]);
    }

    public function sma($id)
    {
        $get = (new SMA())->getById($id);
        return Inertia::render('Pengumuman/SMA/SMA', [
           'datasma' => $get[0]
        ]);
    }

    public function prestasi($id)
    {
        $pendaftar = (new Prestasi())->getPendaftarBySekolah($id);
        $get = (new SMA())->getById($id);
        return Inertia::render('Pengumuman/SMA/Prestasi', [
            'datasma' => $get[0],
            'pesertas' => $pendaftar
        ]);
    }
    public function afirmasi($id)
    {
        $pendaftar = (new Afirmasi())->getPendaftarBySekolah($id);
        $get = (new SMA())->getById($id);
        return Inertia::render('Pengumuman/SMA/Afirmasi', [
            'datasma' => $get[0],
            'pesertas' => $pendaftar
        ]);
    }
    public function pindahtugas($id)
    {
        $pendaftar = (new PindahTugas())->getPendaftarBySekolah($id);
        $get = (new SMA())->getById($id);
        return Inertia::render('Pengumuman/SMA/PindahTugas', [
            'datasma' => $get[0],
            'pesertas' => $pendaftar
        ]);
    }

    public function zonasi($id)
    {
        $pendaftar = (new Zonasi())->getPendaftarBySekolah($id);
        $get = (new SMA())->getById($id);
        return Inertia::render('Pengumuman/SMA/Zonasi', [
            'datasma' => $get[0],
            'pesertass' => $pendaftar[6]
        ]);
    }

}
