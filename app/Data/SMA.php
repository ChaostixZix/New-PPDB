<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SMA extends Model
{
    private function db()
    {
        return DB::table('sekolah_sma');
    }

    public function getAll()
    {
        return $this->db()->get();
    }

    public function getById($id)
    {
        return $this->db()->where('sma_id', $id)->get();
    }
}
