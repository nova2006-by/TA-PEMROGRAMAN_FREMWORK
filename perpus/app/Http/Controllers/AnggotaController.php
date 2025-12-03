<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota_m;

class AnggotaController extends Controller
{
    // Menampilkan daftar anggota
    public function index()
    {
    $anggota = new Anggota_m;
    $data['query'] = Anggota_m::paginate(5);

    return view('anggota.list', $data);
    }
    // Form tambah anggota
    public function add()
    {
        $is_update = false;

        // Pilihan program studi
        $optprogdi = [
            ''  => '- Pilih Program Studi -',
            'TI' => 'Teknik Informatika',
            'SI' => 'Sistem Informasi',
            'MI' => 'Manajemen Informatika'
        ];

        return view('anggota.add', compact('is_update', 'optprogdi'));
    }

    // Simpan data baru atau update
    public function save(Request $r)
    {
        // Validasi sederhana
        $validated = $r->validate([
            'nim' => 'required',
            'nama' => 'required',
            'progdi' => 'required'
        ]);

        if ($r->is_update) {
            $anggota = Anggota_m::find($r->id);
        } else {
            $anggota = new Anggota_m;
        }

        $anggota->nim = $r->nim;
        $anggota->nama = $r->nama;
        $anggota->progdi = $r->progdi;
        $anggota->save();

        return redirect('anggota');
    }

    // Form edit
    public function edit($id)
    {
        $query = Anggota_m::find($id);
        $is_update = true;

        // Pilihan program studi (sama seperti di add)
        $optProgdi = [
            ''  => '- Pilih Program Studi -',
            'TI' => 'Teknik Informatika',
            'SI' => 'Sistem Informasi',
            'MI' => 'Manajemen Informatika'
        ];

        return view('anggota.edit', compact('query', 'is_update', 'optProgdi'));
    }

    // Hapus data
    public function delete($id)
    {
        $anggota = Anggota_m::find($id);
        $anggota->delete();

        return redirect('anggota');
    }
}
