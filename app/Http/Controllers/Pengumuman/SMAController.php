<?php

namespace App\Http\Controllers\Pengumuman;

use App\Data\SMA;
use App\Http\Controllers\Controller;
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
}
