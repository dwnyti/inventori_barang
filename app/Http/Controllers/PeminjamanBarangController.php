<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DataPeminjam;
use App\Models\PeminjamanBarang;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
