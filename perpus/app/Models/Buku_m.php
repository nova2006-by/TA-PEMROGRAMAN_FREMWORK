<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buku_m extends Model
{
    use HasFactory;

    protected $table = 'mst_buku';
    protected $primaryKey = 'ID_Buku';
    public $timestamps = false;

    // Ambil semua data atau berdasarkan kriteria
    public function get_records($criteria = '')
{
    if ($criteria != '') {
        // Ambil satu data (untuk edit)
        return self::where('ID_Buku', $criteria);
    }

    // Ambil semua data dengan pagination
    return self::paginate(5); // bebas 5, 10, 15 dll
}

    // Ambil satu data berdasarkan ID
    public function get_by_id($id)
    {
        return DB::table($this->table)
            ->where('ID_Buku', $id)
            ->first();
    }

    // Insert data baru
    public function insert_record($data)
    {
        return self::insert($data);
    }

    // Update data berdasarkan ID
    public function update_by_id($data, $id)
    {
        return self::where('ID_Buku', $id)
            ->update($data);
    }

    // Hapus data berdasarkan ID
    public function delete_by_id($id)
    {
        return self::where('ID_Buku', $id)
            ->delete();
    }

    // Dropdown data buku
    public function opt_Buku()
    {
        $result = self::select('ID_Buku', 'Judul', 'Pengarang')->get();
        $rowBuku = [];

        foreach ($result as $row) {
            $rowBuku[$row->ID_Buku] = $row->Judul . " - " . $row->Pengarang;
        }

        return $rowBuku;
    }
}