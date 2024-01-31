@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="d-flex">
                    <div class="me-auto bd-highlight">
                        <h4 class="fw-bold">
                            <i class="fa-solid fa-boxes-stacked me-2"></i> {{ $page_title }}
                        </h4>
                    </div>
                    <div class="bd-highlight">
                        <a href="{{ route('barang.create') }}" class="btn btn-warning">
                            <i class="fa fa-plus me-2"></i> Tambah Barang
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="content-header">
                    <div class="table-responsive">
                        <table id="tabel-barang" class="table table-striped table-hover">
                            <thead class="table-primary">
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Gambar Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Lokasi Barang</th>
                                    <th>Aksi</th>   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang_barang as $barang)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->gambar_barang }}</td>
                                        <td>{{ $barang->jumlah }}</td>
                                        <td>{{ $barang->lokasi_id }}</td>
                                        <td>
                                            <a href="" class="btn btn-success" data-bs-toggle="tooltip"
                                                title="Show Product">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="" class="btn btn-warning" data-bs-toggle="tooltip"
                                                title="Edit Product">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger mx-1" data-bs-toggle="tooltip"
                                                {{-- onclick="modalDelete('Product', 'Product {{ $barang->nama_barang }}', '{{ route('product-management.destroy', $barang->id) }}', '{{ route('product-management.index') }}')" --}} title="Delete Product">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            new DataTable("#tabel-barang");
        })
    </script>
@endpush
