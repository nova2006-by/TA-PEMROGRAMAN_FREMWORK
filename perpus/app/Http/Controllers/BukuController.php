<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku_m;

class BukuController extends Controller
{
    var $data;

    // Konstruktor: isi pilihan kategori
    public function __construct()
    {
        $this->data['opt_kategori'] = [
            '' => '-Pilih salah satu-',
            'novel' => 'Novel',
            'komik' => 'Komik',
            'kamus' => 'Kamus',
            'program' => 'Pemrograman'
        ];
    }

    // ===== READ: Menampilkan daftar buku =====
    public function index()
    {
        $buku = new Buku_m(); 
        $data = [
            //'query' => $buku->get_records(),
            'query' => $buku->get_records(),
            'optkategori' => $this->data['opt_kategori']
        ];
        return view('buku.list', $data);
    }

    // ===== CREATE: Menampilkan form tambah =====
    public function add_new()
    {
        $data = [
            'is_update' => 0,
            'optkategori' => $this->data['opt_kategori']
        ];
        return view('buku.add', $data);
    }

    // ===== CREATE & UPDATE: Menyimpan data =====
    public function save(Request $request)
    {
        $buku = new Buku_m();
        $validated = $request->validate([
            'Judul' => 'required',
            'Pengarang' => 'required',
            'Kategori' => 'required'
        ]);

        $data = [
            'Judul' => $request->input('Judul'),
            'Pengarang' => $request->input('Pengarang'),
            'Kategori' => $request->input('Kategori')
        ];

        $is_update = $request->input('is_update');

        if ($is_update == 0) {
            // INSERT
            if ($buku->insert_record($data)) {
                return redirect('buku');
            }
        } else {
            // UPDATE
            $id = $request->input('id');
            if ($buku->update_by_id($data, $id)) {
                return redirect('buku');
            }
        }
    }

    // ===== UPDATE: Menampilkan form edit =====
    public function edit($id)
    {
        $buku = new Buku_m();
        $data = [
            'query' => $buku->get_records($id)->first(),
            'is_update' => 1,
            'optkategori' => $this->data['opt_kategori']
        ];
        return view('buku.edit', $data);
    }

    // ===== DELETE: Menghapus data =====
    public function delete($id)
    {
        $buku = new Buku_m();
        if ($buku->delete_by_id($id)) {
            return redirect('buku');
        }
    }
}
