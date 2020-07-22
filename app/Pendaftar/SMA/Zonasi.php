<?php

namespace App\Pendaftar\SMA;

use App\Data\SMA;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Zonasi extends Model
{
    private function db()
    {
        return DB::table('daftar_zonasi');
    }
    public function getPendaftarBySekolah($sma_id)
    {
        $kuotaAllSekolah = (new SMA())->getAll();
        foreach ($kuotaAllSekolah as $k) {
            $kuotaAllSekolah[$k->sma_id] = $k->kuota;
        }
        $pemilih1 = $this->db()->where([
            'pilihan1' => $sma_id,
            'daftar_zonasi.lock' => 1
        ])->orderBy('jarak1', 'asc')
            ->leftJoin('data_siswa', 'daftar_zonasi.nopes', '=', 'data_siswa.nopes')
            ->limit($kuotaAllSekolah[$sma_id])
            ->get();
        $pemilih2LuarKuota = [];
        $sisaKuota = $kuotaAllSekolah[$sma_id] - count($pemilih1);
        if (count($pemilih1) < $kuotaAllSekolah[$sma_id])
        {
            $pemilih2 = $this->db()->where([
                'pilihan2' => $sma_id,
                'daftar_zonasi.lock' => 1
            ])->orderBy('jarak2', 'asc')
                ->leftJoin('data_siswa', 'daftar_zonasi.nopes', '=', 'data_siswa.nopes')
                ->get();
            foreach ($pemilih2 as $p) {
                if ($sisaKuota > 0) {
                    $getPendaftarDia = $this->db()->where('pilihan1', $p->pilihan1)->orderBy('jarak1', 'asc')->skip($kuotaAllSekolah[$p->pilihan1])->limit(1000)->get();
                    if (count($getPendaftarDia) > 0) {
                        foreach ($getPendaftarDia as $g) {
                            if ($g->id == $p->id) {
                                $pemilih2LuarKuota[] = $p;
                                $sisaKuota = $sisaKuota - 1;
                            }
                        }
                    }
                }
            }
        }
        $pesertas = [];
        $pesertass = [];
        $pemilih1s = [];
        $pemilih2s = [];
        $pemilihs = [];
        foreach ($pemilih1 as $p)
        {
            $p->pemilih = 1;
            $pemilih1s[$p->id] = $p;
            $pesertas[$p->id] = (float)$p->jarak1;
            $pesertass[$p->id] = '1';
        }
        foreach ($pemilih2LuarKuota as $p)
        {
            $p->pemilih = 2;
            $pemilih2s[$p->id] = $p;
            $pesertas[$p->id] = (float)$p->jarak2;
            $pesertass[$p->id] = '2' . $p->jarak2;
        }
        asort($pesertas);
        foreach($pesertas as $index => $p)
        {
            if(isset($pemilih1s[$index]))
            {
                $pemilihs[] = $pemilih1s[$index];
            }else{
                $pemilihs[] = $pemilih2s[$index];
            }
        }
        return [$pemilih1s, $pemilih2s, (int) count($pemilih1), (int) count($pemilih2LuarKuota), $sisaKuota, $pesertas, $pemilihs];
    }

    public function getPendaftarBySekolah2($sma_id)
    {
        $kuotaAllSekolah = (new SMA())->getAll();
        foreach ($kuotaAllSekolah as $k) {
            $kuotaAllSekolah[$k->sma_id] = $k->kuota;
        }
        $pemilih1 = $this->db()->where([
            'pilihan1' => $sma_id,
            'daftar_zonasi.lock' => 1
        ])->orderBy('jarak1', 'asc')
            ->leftJoin('data_siswa', 'daftar_zonasi.nopes', '=', 'data_siswa.nopes')
            ->limit($kuotaAllSekolah[$sma_id])
            ->get();
        $pemilih2LuarKuota = [];
//        $sisaKuota = $kuotaAllSekolah[$sma_id] - count($pemilih1);
        $sisaKuota = 20;
        if ($sisaKuota > 0)
        {
            $pemilih2 = $this->db()->where([
                'pilihan2' => $sma_id,
                'daftar_zonasi.lock' => 1
            ])->orderBy('jarak2', 'asc')
                ->leftJoin('data_siswa', 'daftar_zonasi.nopes', '=', 'data_siswa.nopes')
                ->get();
            foreach ($pemilih2 as $p) {
                if ($sisaKuota > 0) {
                    $getPendaftarDia = $this->db()->where('pilihan1', $p->pilihan1)->orderBy('jarak1', 'asc')->skip($kuotaAllSekolah[$p->pilihan1])->limit(1000)->get();
                    if (count($getPendaftarDia) > 0) {
                        foreach ($getPendaftarDia as $g) {
                            if ($g->id == $p->id) {
                                $pemilih2LuarKuota[] = $p;
                                $sisaKuota = $sisaKuota - 1;
                            }
                        }
                    }
                }
            }
        }
        $pesertas = [];
        $pesertass = [];
        $pemilih1s = [];
        $pemilih2s = [];
        $pemilihs = [];
        foreach ($pemilih1 as $p)
        {
            $p->pemilih = 1;
            $pemilih1s[$p->id] = $p;
            $pesertas[$p->id] = (float)$p->jarak1;
            $pesertass[$p->id] = '1';
        }
        foreach ($pemilih2LuarKuota as $p)
        {
            $p->pemilih = 2;
            $pemilih2s[$p->id] = $p;
            $pesertas[$p->id] = (float)$p->jarak2;
            $pesertass[$p->id] = '2' . $p->jarak2;
        }
        asort($pesertas);
        foreach($pesertas as $index => $p)
        {
            if(isset($pemilih1s[$index]))
            {
                $pemilihs[] = $pemilih1s[$index];
            }else{
                $pemilihs[] = $pemilih2s[$index];
            }
        }
        return [$pemilih1s, $pemilih2s, (int) count($pemilih1), (int) count($pemilih2LuarKuota), $sisaKuota, $pesertas, $pemilihs];
    }
}
