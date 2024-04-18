<?php

namespace App\Http\Controllers;

use App\Models\KelasData;
use App\Models\DataPeminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Data Peminjam';
        $data['data_peminjam'] = DataPeminjam::with('kelas')->orderBy('id', 'asc')->get();
        return view('data_peminjam.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Tambah Data Peminjam';
        $data['data_peminjam'] = DataPeminjam::get();
        $data['kelas_data'] = KelasData::get();
        return view('data_peminjam.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required|in:Guru,Staff Tata Usaha,Siswa',
            'kelas_id' => 'required_if:status,Siswa'
        ]);

        DB::beginTransaction();

        try {
            $data_peminjam = new DataPeminjam;
            $data_peminjam->nama = $request->nama;
            $data_peminjam->status = $request->status;
            
            if ($data_peminjam->status === 'Siswa') {
                $data_peminjam->kelas_id = $request->kelas_id;
            } 

            $data_peminjam->save();
            DB::commit();
            return redirect()->route('data_peminjam.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['page_title'] = 'Lihat Data Peminjam';
        $data['data_peminjam'] = DataPeminjam::findOrFail($id);
        $data['kelas_data'] = KelasData::get();
        return view('data_peminjam.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['page_title'] = 'Ubah Data Peminjam';
        $data['data_peminjam'] = DataPeminjam::findOrFail($id);
        $data['kelas_data'] = KelasData::get();
        return view('data_peminjam.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
            'kelas_id' => 'required_if:status,Siswa'
        ]);

        DB::beginTransaction();

        try {
            $data_peminjam = DataPeminjam::findOrFail($id);
            $data_peminjam->nama = $request->nama;
            $data_peminjam->status = $request->status;
            
            if ($data_peminjam->status === 'Siswa') {
                $data_peminjam->kelas_id = $request->kelas_id;
            } 

            $data_peminjam->save();
            DB::commit();
            return redirect()->route('data_peminjam.index')->with('success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $data_peminjam = DataPeminjam::find($id);
            $data_peminjam->delete();

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }
}
