@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @include('alert.alert-message')
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="fw-bold">
                    <i class="fa-solid fa-boxes-packing me-2"></i> {{ $page_title }}
                </h4>
            </div>
            <form action="{{ route('peminjaman_barang.store') }}" method="post">
                @csrf
                <div class="card-body">
                    {{-- NAMA PEMINJAM --}}
                    <div class="mb-3">
                        <label for="peminjam_id" class="form-label">Nama Peminjam</label>
                        <select id="peminjam_id" name="peminjam_id"
                            class="form-select @error('peminjam_id') is-invalid @enderror">
                            <option value="" selected disabled>Pilih peminjam</option>
                            @foreach ($peminjam_peminjam as $peminjam)
                                <option value="{{ $peminjam->id }}"
                                    {{ $peminjam->id == old('peminjam_id') ? 'selected' : '' }}>
                                    {{ $peminjam->nama }}</option>
                            @endforeach
                        </select>
                        @error('peminjam_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- NAMA BARANG --}}
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Nama Barang</label>
                        <select id="barang_id" name="barang_id"
                            class="form-select @error('barang_id') is-invalid @enderror">
                            <option value="" selected disabled>Pilih barang</option>
                            @foreach ($barang_barang as $barang)
                                <option value="{{ $barang->id }}" {{ $barang->id == old('barang_id') ? 'selected' : '' }}>
                                    {{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('barang_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- JUMLAH BARANG --}}
                    <div class="mb-3">
                        <label for="jumlah_pinjam" class="form-label">Jumlah Pinjam Barang</label>
                        <input type="number" id="jumlah_pinjam" name="jumlah_pinjam"
                            class="form-control @error('jumlah_pinjam') is-invalid @enderror"
                            placeholder="Masukkan kode barang" value="{{ old('jumlah_pinjam') }}">
                        @error('jumlah_pinjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- CATATAN --}}
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" cols="3" rows="3"
                            class="form-control @error('catatan') is-invalid @enderror" placeholder="Masukkan catatan">{{ old('catatan') }}</textarea>
                        @error('catatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('peminjaman_barang.index') }}" class="btn btn-sm btn-secondary me-2">
                        <i class="fa fa-arrow-left me-2"></i> Kembali
                    </a>
                    <button class="btn btn-sm btn-primary" type="submit">
                        <i class="fa fa-paper-plane me-2"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
