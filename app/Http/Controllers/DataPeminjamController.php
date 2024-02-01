<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPeminjam;

class DataPeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Data Peminjam';
        $data['data_peminjam'] = DataPeminjam::all();
        return view('data_peminjam.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Create Data Peminjam';
        $data['data_peminjam'] = DataPeminjam::all();
        return view('data_peminjam.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
            'kelas' => 'nullable'
        ]);

        try {
            $data_peminjam = new DataPeminjam;
            $data_peminjam->nama = $request->input('nama');
            $data_peminjam->status = $request->input('status');
            
            if ($data_peminjam->status === 'siswa') {
                $data_peminjam->kelas = $request->input('kelas');
            } else {
                $data_peminjam->kelas = '-';
            }

            $data_peminjam->save();
            return redirect()->route('data_peminjam.index')->with('successCreateData', 'Data berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('data_peminjam.index')->with('failedCreateData', 'Data tidak berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['page_title'] = 'Show Data';
        $data['show'] = DataPeminjam::findOrFail($id);
        return view('data_peminjam.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['page_title'] = 'Edit Data Peminjam';
        $data['data_peminjam'] = DataPeminjam::findOrFail($id);
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
            'kelas' => 'nullable'
        ]);

        try {
            $data_peminjam = DataPeminjam::findOrFail($id);
            $data_peminjam->nama = $request->input('nama');
            $data_peminjam->status = $request->input('status');
            
            if ($data_peminjam->status === 'siswa') {
                $data_peminjam->kelas = $request->input('kelas');
            } else {
                $data_peminjam->kelas = '-';
            }

            $data_peminjam->save();
            return redirect()->route('data_peminjam.index')->with('successEditData', 'Data berhasil diedit!');
        } catch (\Throwable $th) {
            return redirect()->route('data_peminjam.index')->with('failedEditData', 'Data tidak berhasil diedit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     try {
    //         DataPeminjam::destroy($id);
    //         return response()->json(['success' => true]);
    //     } catch (\Exception $e) {
    //         return response()->json(['success' => false]);
    //     }
    // }

    public function destroy(string $id)
    {
        try {
            DataPeminjam::destroy($id);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false]);
        }
    }
}
