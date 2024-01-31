@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="fw-bold">
                    <i class="fa-solid fa-boxes-stacked me-2"></i> {{ $page_title }}
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            {{-- NAMA BARANG --}}
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" id="nama_barang"
                                    class="form-control @error('nama_barang') is-invalid @enderror"
                                    placeholder="Masukkan nama barang" value="{{ old('nama_barang') }}">
                                @error('nama_barang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- KODE BARANG --}}
                            <div class="mb-3">
                                <label for="kode_barang" class="form-label">Kode Barang</label>
                                <input type="text" id="kode_barang"
                                    class="form-control @error('kode_barang') is-invalid @enderror"
                                    placeholder="Masukkan kode barang" value="{{ old('kode_barang') }}">
                                @error('kode_barang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- GAMBAR BARANG --}}
                            <div class="mb-3">
                                <label for="gambar_barang" class="form-label">Kode Barang</label>
                                <img src="" alt="" class="mb-2 img-fluid preview_barang d-block">
                                <input type="file" id="gambar_barang"
                                    class="form-control @error('gambar_barang') is-invalid @enderror" accept="image/*">
                                <small class="text-secondary">Pastikan upload dengan format file image</small>
                                @error('gambar_barang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- JUMLAH --}}
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Barang</label>
                                <input type="number" id="jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror"
                                    placeholder="Masukkan jumlah barang" value="{{ old('jumlah') }}">
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- LOKASI BARANG --}}
                            <div class="mb-3">
                                <label for="lokasi_id" class="form-label">Lokasi Barang</label>
                                <select id="lokasi_id" class="form-control @error('lokasi_id') is-invalid @enderror">
                                    <option value="" selected disabled>Pilih lokasi barang</option>
                                    @foreach ($lokasi_lokasi as $lokasi)
                                        <option value="{{ $lokasi->id }}"
                                            {{ $lokasi->id == old('lokasi_id') ? 'selected' : '' }}>
                                            {{ $lokasi->nama_lokasi }}</option>
                                    @endforeach
                                </select>
                                @error('lokasi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('barang.index') }}" class="btn btn-sm btn-secondary me-2">
                    <i class="fa fa-arrow-left me-2"></i> Kembali
                </a>
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-paper-plane me-2"></i> Simpan
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#gambar_barang').on('change', function(e) {
            const blob = URL.createObjectURL(e.target.files[0])
            $('.preview_barang').attr('src', blob).width(200)
        })
    </script>
@endpush
