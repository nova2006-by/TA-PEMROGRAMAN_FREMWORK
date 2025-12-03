<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam_m;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    public function index()
    {
        $query = Pinjam_m::paginate(5);
        return view('pinjam.list', compact('query'));
    }

    public function add()
    {
        $optanggota = [
            '1' => 'G.211.16.0111 - Andre',
            '2' => 'G.211.16.0112 - Indra',
            '3' => 'G.211.16.0125 - Joni A'
        ];

        $optbuku = [
            '1' => 'Senja Kelabu - Mutia',
            '2' => 'Donald Bebek - Disney',
            '5' => 'UML - Rosa'
        ];

        return view('pinjam.add', compact('optanggota', 'optbuku'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'ID_Anggota' => 'required',
            'ID_Buku' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date'
        ]);

        Pinjam_m::create([
            'ID_Anggota' => $request->ID_Anggota,
            'ID_Buku' => $request->ID_Buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return redirect('pinjam')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $pinjam = Pinjam_m::find($id);

        $optanggota = [
            '1' => 'G.211.16.0111 - Andre',
            '2' => 'G.211.16.0112 - Indra',
            '3' => 'G.211.16.0125 - Joni A'
        ];

        $optbuku = [
            '1' => 'Senja Kelabu - Mutia',
            '2' => 'Donald Bebek - Disney',
            '5' => 'UML - Rosa'
        ];

        return view('pinjam.edit', compact('pinjam', 'optanggota', 'optbuku'));
    }

    public function update(Request $request, $id)
    {
        Pinjam_m::where('ID_Pinjam', $id)->update([
            'ID_Anggota' => $request->ID_Anggota,
            'ID_Buku' => $request->ID_Buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return redirect('pinjam')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        Pinjam_m::where('ID_Pinjam', $id)->delete();
        return redirect('pinjam')->with('success', 'Data berhasil dihapus!');
    }
}
