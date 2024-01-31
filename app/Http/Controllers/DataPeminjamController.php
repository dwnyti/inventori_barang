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
        $data['title'] = 'Data Peminjam';
        $data['data_peminjam'] = DataPeminjam::all();
        return view('data_peminjam.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Data Peminjam';
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
            return redirect()->route('data_peminjam.index');
        } catch (\Throwable $th) {
            return redirect()->route('data_peminjam.index')->with('failed', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['title'] = 'Show Data';
        $data['show'] = DataPeminjam::findOrFail($id);
        return view('data_peminjam.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = 'Edit Data Peminjam';
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
            return redirect()->route('data_peminjam.index');
        } catch (\Throwable $th) {
            return redirect()->route('data_peminjam.index')->with('failed', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DataPeminjam::destroy($id);
    }
}
