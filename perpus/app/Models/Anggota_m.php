<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Anggota_m extends Model
{
    use HasFactory;

    protected $table = 'mst_anggota';
    protected $primaryKey = 'ID_Anggota';
    public $timestamps = false;

    public function get_records($criteria = '')
    {
        return self::when($criteria, function ($q) use ($criteria) {
            return $q->where('ID_Anggota', $criteria);
        })->get();
    }

    public function insert_record($data)
    {
        return self::insert($data);
    }

    public function update_by_id($data, $id)
    {
        return self::where('ID_Anggota', $id)->update($data);
    }

    public function delete_by_id($id)
    {
        return self::where('ID_Anggota', $id)->delete();
    }

    public function opt_Anggota()
    {
        $result = self::select('ID_Anggota', 'Nim', 'Nama')->get();
        $rowAnggota = [];

        foreach ($result as $row) {
            $rowAnggota[$row->ID_Anggota] = $row->Nim . ' - ' . $row->Nama;
        }

        return $rowAnggota;
    }
}
