<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\Donatur;

class DonasiController extends Controller
{
    // Tampilkan semua donasi
    public function index()
    {
        // Ambil semua donasi dari database
        $donasi = Donasi::all();

        // Hitung jumlah total orang yang berdonasi dari tabel Donatur
        $totalOrang = Donatur::distinct('nama')->count('nama'); // Menghitung jumlah unik donatur

        // Kirim data ke view
        return view('donasi.donasi', compact('donasi', 'totalOrang'));
    }


    // Tampilkan form untuk tambah donasi
    public function create()
    {
        return view('donasi.create');
    }

    // Simpan data donasi baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target_amount' => 'required|numeric|min:0',
            'category' => 'required|in:Banjir,Gempa,Lainnya',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Simpan gambar ke folder assets/images jika ada
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/images'), $imageName);
            $data['image'] = 'assets/images/' . $imageName;
        }

        Donasi::create($data);

        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil ditambahkan!');
    }


    // Tampilkan form edit donasi
    public function edit($id)
    {
        $donasi = Donasi::findOrFail($id);
        return view('donasi.edit', compact('donasi'));
    }

    // Update data donasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target_amount' => 'required|numeric|min:0',
            'category' => 'required|in:Banjir,Gempa,Lainnya',
        ]);

        $donasi = Donasi::findOrFail($id);
        $donasi->update($request->all());

        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil diperbarui!');
    }

    // Hapus donasi
    public function destroy($id)
    {
        $donasi = Donasi::findOrFail($id);
        $donasi->delete();

        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil dihapus!');
    }

    // Tampilkan detail donasi berdasarkan ID
    public function show($id)
    {
        $donasi = Donasi::findOrFail($id); // Mengambil satu objek berdasarkan ID
        return view('donaturs.create', compact('donasi'));
    }
}
