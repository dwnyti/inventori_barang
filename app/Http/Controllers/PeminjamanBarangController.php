<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DataPeminjam;
use Illuminate\Http\Request;
use App\Models\PeminjamanBarang;
use Illuminate\Support\Facades\DB;

class PeminjamanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Peminjaman Barang';
        $data['peminjaman_peminjaman'] = PeminjamanBarang::get();
        return view('peminjaman_barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Tambah Peminjaman Barang';
        $data['barang_barang'] = Barang::get();
        $data['peminjam_peminjam'] = DataPeminjam::get();
        return view('peminjaman_barang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'peminjam_id' => 'required',
            'barang_id' => 'required',
            'jumlah_pinjam' => 'required|numeric',
            'catatan' => 'nullable',
        ]);

        DB::beginTransaction();

        try {
            $dataPinjam = new PeminjamanBarang();
            $dataPinjam->peminjam_id = $request->peminjam_id;
            $dataPinjam->barang_id = $request->barang_id;
            $dataPinjam->jumlah_pinjam = $request->jumlah_pinjam;
            $dataPinjam->catatan = $request->catatan;
            $dataPinjam->tanggal_pinjam = now()->toDateString();
            $dataPinjam->status = 'Masih dipinjam';
            $dataPinjam->save();

            DB::commit();
            return redirect()->route('peminjaman_barang.index')->with('successCreateData', 'Data berhasil ditambahkan!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failedCreateData', 'Data tidak berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['page_title'] = 'Lihat Peminjaman Barang';
        $data['peminjaman_barang'] = PeminjamanBarang::findOrFail($id);
        return view('peminjaman_barang.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['page_title'] = 'Ubah Peminjaman Barang';
        $data['peminjaman_barang'] = PeminjamanBarang::findOrFail($id);
        $data['barang_barang'] = Barang::get();
        $data['peminjam_peminjam'] = DataPeminjam::get();
        return view('peminjaman_barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'peminjam_id' => 'required',
            'barang_id' => 'required',
            'jumlah_pinjam' => 'required|numeric',
            'catatan' => 'nullable',
        ]);

        DB::beginTransaction();

        try {
            $dataPinjam = PeminjamanBarang::findOrfail($id);
            $dataPinjam->peminjam_id = $request->peminjam_id;
            $dataPinjam->barang_id = $request->barang_id;
            $dataPinjam->jumlah_pinjam = $request->jumlah_pinjam;
            $dataPinjam->catatan = $request->catatan;
            $dataPinjam->save();

            DB::commit();
            return redirect()->route('peminjaman_barang.index')->with('successCreateData', 'Data berhasil ditambahkan!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failedCreateData', 'Data tidak berhasil ditambahkan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $peminjaman_barang = PeminjamanBarang::find($id);
            $peminjaman_barang->delete();

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }
}
