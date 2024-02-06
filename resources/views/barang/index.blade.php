@extends('layouts.app')

@push('styles')
@endpush

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @include('alert.alert-message')
            </div>
        </div>
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
                                    <th>Lokasi Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang_barang as $barang)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>
                                            @if ($barang->gambar_barang)
                                                <img src="{{ asset('storage/gambar_barang/' . $barang->gambar_barang) }}"
                                                    alt="{{ $barang->nama_barang }}" title="{{ $barang->nama_barang }}"
                                                    width="100" height="auto">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $barang->lokasi->nama_lokasi }}</td>
                                        <td>{{ $barang->jumlah }}</td>
                                        <td>
                                            <a href="{{ route('barang.show', $barang->id) }}"
                                                class="btn btn-sm btn-success" data-bs-toggle="tooltip"
                                                title="Show Product">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('barang.edit', $barang->id) }}"
                                                class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                title="Edit Product">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete"
                                                onclick="hapus('{{ $barang->id }}')">
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

        function hapus(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan panggilan AJAX untuk menghapus data
                    $.ajax({
                        url: '/barang/' + id, // Sesuaikan dengan URL delete di controller Anda
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // Sertakan token CSRF dalam data
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your data has been deleted.",
                                    icon: "success"
                                }).then(() => {
                                    // Redirect atau lakukan tindakan lain setelah penghapusan berhasil
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "Error",
                                    text: "Failed to delete the data.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: "Error",
                                text: "Failed to delete the data.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
