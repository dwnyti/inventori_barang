@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="fw-bold">
                    <i class="fa-solid fa-boxes-packing me-2"></i> {{ $page_title }}
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {{-- NAMA PEMINJAM --}}
                        <div class="mb-3">
                            <label for="peminjam_id" class="form-label">Nama Peminjam</label>
                            <select id="peminjam_id" name="peminjam_id" class="form-select" disabled>
                                <option value="" selected disabled>{{ $peminjaman_barang->peminjam->nama }}</option>
                            </select>
                        </div>

                        {{-- STATUS PEMINJAM --}}
                        <div class="mb-3">
                            <label for="jumlah_pinjam" class="form-label">Jumlah Pinjam Barang</label>
                            <input type="text" id="jumlah_pinjam" name="jumlah_pinjam" disabled class="form-control"
                                value="{{ $peminjaman_barang->peminjam->status }}">
                        </div>

                        {{-- NAMA BARANG --}}
                        <div class="mb-3">
                            <label for="barang_id" class="form-label">Nama Barang</label>
                            <select id="barang_id" name="barang_id" class="form-select" disabled>
                                <option value="" selected disabled>{{ $peminjaman_barang->barang->nama_barang }}
                                </option>
                            </select>
                        </div>

                        {{-- KODE BARANG --}}
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <input type="text" id="kode_barang" name="kode_barang" disabled class="form-control"
                                value="{{ $peminjaman_barang->barang->kode_barang }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- JUMLAH BARANG --}}
                        <div class="mb-3">
                            <label for="jumlah_pinjam" class="form-label">Jumlah Pinjam Barang</label>
                            <input type="number" id="jumlah_pinjam" name="jumlah_pinjam" disabled class="form-control"
                                value="{{ $peminjaman_barang->jumlah_pinjam }}">
                        </div>

                        {{-- STATUS --}}
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" id="status" name="status" disabled class="form-control"
                                value="{{ $peminjaman_barang->status }}">
                        </div>

                        {{-- TANGGAL PINJAM --}}
                        <div class="mb-3">
                            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="text" id="tanggal_pinjam" name="tanggal_pinjam" disabled class="form-control"
                                value="{{ $peminjaman_barang->tanggal_pinjam }}">
                        </div>

                        {{-- TANGGAL PENGEMBALIAN --}}
                        <div class="mb-3">
                            <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                            <input type="text" id="tanggal_pengembalian" name="tanggal_pengembalian" disabled
                                class="form-control" value="{{ $peminjaman_barang->tanggal_pengembalian ?? '-' }}">
                        </div>
                    </div>
                </div>

                {{-- CATATAN --}}
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea name="catatan" id="catatan" cols="3" rows="3" disabled class="form-control">{{ $peminjaman_barang->catatan }}</textarea>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('peminjaman_barang.index') }}" class="btn btn-sm btn-secondary me-2">
                    <i class="fa fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
