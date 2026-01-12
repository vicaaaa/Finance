<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:1',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Tabungan::create([
            'user_id' => auth()->id(),
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Data tabungan berhasil disimpan!');
    }

    public function destroy(Tabungan $tabungan)
{
    // 1. Keamanan: Pastikan yang menghapus adalah pemilik datanya
    if ($tabungan->user_id !== auth()->id()) {
        abort(403, 'Anda tidak berhak menghapus data ini.');
    }

    // 2. Hapus data dari database
    $tabungan->delete();

    // 3. Kembali ke dashboard dengan pesan sukses
    return redirect()->back()->with('success', 'Catatan tabungan berhasil dihapus!');
}
}

