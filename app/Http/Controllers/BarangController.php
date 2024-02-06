<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Barang';
        $data['barang_barang'] = Barang::with('lokasi')->orderBy('id', 'asc')->get();
        return view('barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Tambah Barang';
        $data['lokasi_lokasi'] = Lokasi::get();
        return view('barang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:barangs',
            'gambar_barang' => 'nullable',
            'jumlah' => 'required|numeric',
            'lokasi_id' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $barang = new Barang();
            $barang->nama_barang = $request->nama_barang;
            $barang->kode_barang = $request->kode_barang;
            $barang->jumlah = $request->jumlah;
            $barang->lokasi_id = $request->lokasi_id;

            if ($request->hasFile('gambar_barang')) {
                $fileGambar = $request->gambar_barang;
                $namaGambar = strtotime('now') . '-' . $barang->kode_barang;
                $folderSimpan = 'gambar_barang/';
                $fileGambar->storeAs($folderSimpan, $namaGambar, 'public');
                $barang->gambar_barang = $namaGambar;
            }
            $barang->save();

            DB::commit();
            return redirect()->route('barang.index')->with('successCreateData', 'Data berhasil ditambahkan!');
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
        $data['page_title'] = 'Lihat Barang';
        $data['barang'] = Barang::findOrFail($id);
        return view('barang.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['page_title'] = 'Ubah Barang';
        $data['barang'] = Barang::findOrFail($id);
        $data['lokasi_lokasi'] = Lokasi::get();
        return view('barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $id,
            'gambar_barang' => 'nullable',
            'jumlah' => 'required|numeric',
            'lokasi_id' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $barang = Barang::findOrFail($id);
            $barang->nama_barang = $request->nama_barang;
            $barang->kode_barang = $request->kode_barang;
            $barang->jumlah = $request->jumlah;
            $barang->lokasi_id = $request->lokasi_id;

            if ($request->hasFile('gambar_barang')) {
                if ($barang->gambar_barang) {
                    Storage::disk('public')->delete('gambar_barang/' . $barang->gambar_barang);
                }

                $fileGambar = $request->gambar_barang;
                $namaGambar = strtotime('now') . '-' . $barang->kode_barang;
                $folderSimpan = 'gambar_barang/';
                $fileGambar->storeAs($folderSimpan, $namaGambar, 'public');
                $barang->gambar_barang = $namaGambar;
            }
            $barang->save();

            DB::commit();
            return redirect()->route('barang.index')->with('successCreateData', 'Data berhasil ditambahkan!');
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
            $barang = Barang::find($id);
            $barang->delete();

            if($barang->gambar_barang){
                Storage::disk('public')->delete('gambar_barang/' . $barang->gambar_barang);
            }
            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }
}
