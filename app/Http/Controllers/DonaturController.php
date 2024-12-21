<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Donasi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    // ==== AWAL TAMPIL DATA (UNTUK ADMIN) ====
    public function index(): View
    {
        $donaturs = Donatur::with('donasi')->latest()->get(); // Ambil data donatur dengan relasi donasi
        return view('donaturs.index', compact('donaturs'));
    }
    // ---- AKHIR TAMPIL DATA ----

    // ==== AWAL TAMPIL DATA (UNTUK PUBLIC) ====
    public function tampilDonatur(): View
    {
        $donaturs = Donatur::with('donasi')->latest()->get();
        return view('donaturs.donaturPublic', compact('donaturs'));
    }
    // ---- AKHIR TAMPIL DATA ----

    // ==== AWAL TAMBAH DATA ====
    public function create($donasiId = null): View
    {
        $donasi = $donasiId ? Donasi::findOrFail($donasiId) : null; // Jika ada ID donasi, ambil data terkait
        return view('donaturs.create', compact('donasi'));
    }
    // ---- AKHIR TAMBAH DATA ----

    // ==== AWAL SIMPAN DATA ====
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama'         => 'required|string|min:1',
            'pesan'        => 'nullable|string|min:1',
            'total_donasi' => 'required|string|min:1',
            'tipe_bayar'   => 'required|string|min:1',
            'donasi_id'    => 'required|exists:donasi,id',
        ]);

        // Buang titik dan format angka dari total donasi
        $total_donasi = str_replace(['Rp. ', '.', ','], '', $request->total_donasi);

        if (!is_numeric($total_donasi) || $total_donasi < 1) {
            return redirect()->back()->withErrors(['total_donasi' => 'Total donasi harus berupa angka dan minimal 1'])->withInput();
        }

        // Simpan data donatur
        Donatur::create([
            'nama'         => $request->nama,
            'pesan'        => $request->pesan,
            'total_donasi' => $total_donasi,
            'tipe_bayar'   => $request->tipe_bayar,
            'donasi_id'    => $request->donasi_id,
        ]);

        // Update jumlah terkumpul di tabel donasi
        $donasi = Donasi::findOrFail($request->donasi_id);
        $donasi->increment('amount_collected', $total_donasi);

        return redirect()->route('donatur')->with(['success' => 'Donasi berhasil disimpan!']);
    }
    // ---- AKHIR SIMPAN DATA ----

    // ==== AWAL EDIT DATA ====
    public function edit(string $id): View
    {
        $donatur = Donatur::with('donasi')->findOrFail($id); // Ambil data donatur dengan relasi donasi
        $donasiList = Donasi::all(); // Ambil semua donasi untuk dropdown (opsional)
        return view('donaturs.edit', compact('donatur', 'donasiList'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama'         => 'required|string|min:1',
            'pesan'        => 'nullable|string|min:1',
            'total_donasi' => 'required|string|min:1',
            'tipe_bayar'   => 'required|string|min:1',
            'donasi_id'    => 'required|exists:donasi,id',
        ]);

        // Buang titik dan format angka dari total donasi
        $total_donasi = str_replace(['Rp. ', '.', ','], '', $request->total_donasi);

        if (!is_numeric($total_donasi) || $total_donasi < 1) {
            return redirect()->back()->withErrors(['total_donasi' => 'Total donasi harus berupa angka dan minimal 1'])->withInput();
        }

        $donatur = Donatur::findOrFail($id);

        // Update jumlah terkumpul pada donasi terkait
        if ($donatur->donasi_id != $request->donasi_id) {
            $oldDonasi = Donasi::findOrFail($donatur->donasi_id);
            $oldDonasi->decrement('amount_collected', $donatur->total_donasi);

            $newDonasi = Donasi::findOrFail($request->donasi_id);
            $newDonasi->increment('amount_collected', $total_donasi);
        } else {
            $donatur->donasi->increment('amount_collected', $total_donasi - $donatur->total_donasi);
        }

        // Update data donatur
        $donatur->update([
            'nama'         => $request->nama,
            'pesan'        => $request->pesan,
            'total_donasi' => $total_donasi,
            'tipe_bayar'   => $request->tipe_bayar,
            'donasi_id'    => $request->donasi_id,
        ]);

        return redirect()->route('donaturs.index')->with(['success' => 'Data berhasil diperbarui!']);
    }
    // ---- AKHIR EDIT DATA ----

    // ==== AWAL HAPUS DATA ====
    public function destroy($id): RedirectResponse
    {
        $donatur = Donatur::findOrFail($id);

        // Kurangi jumlah terkumpul di donasi terkait
        if ($donatur->donasi_id) {
            $donasi = Donasi::findOrFail($donatur->donasi_id);
            $donasi->decrement('amount_collected', $donatur->total_donasi);
        }

        $donatur->delete();

        return redirect()->route('donaturs.index')->with(['success' => 'Data berhasil dihapus!']);
    }
    // ---- AKHIR HAPUS DATA ----
}
