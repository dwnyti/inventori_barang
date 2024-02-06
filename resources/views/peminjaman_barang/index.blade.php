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
                            <i class="fa-solid fa-boxes-packing me-2"></i> {{ $page_title }}
                        </h4>
                    </div>
                    <div class="bd-highlight">
                        <a href="{{ route('peminjaman_barang.create') }}" class="btn btn-warning">
                            <i class="fa fa-plus me-2"></i> Tambah Peminjaman Barang
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="content-header">
                    <div class="table-responsive">
                        <table id="tabel-peminjaman-barang" class="table table-striped table-hover">
                            <thead class="table-primary">
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Peminjam</th>
                                    <th>Status Peminjam</th>
                                    <th>Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Jumlah Dipinjam</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman_peminjaman as $peminjaman)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peminjaman->peminjam->nama }}</td>
                                        <td>{{ $peminjaman->peminjam->status }}</td>
                                        <td>{{ $peminjaman->barang->nama_barang }}</td>
                                        <td>{{ $peminjaman->barang->kode_barang }}</td>
                                        <td>{{ $peminjaman->jumlah_pinjam }}</td>
                                        <td>
                                            <span
                                                class="badge @if ($peminjaman->status === 'Masih dipinjam') text-bg-warning @else text-bg-success @endif">{{ $peminjaman->status }}</span>
                                        </td>
                                        <td>
                                            @if ($peminjaman->status === 'Masih dipinjam')
                                                <button class="btn btn-sm btn-info mb-1" data-bs-toggle="tooltip"
                                                    title="Pengembalian barang"
                                                    onclick="barang_kembali('{{ $peminjaman->id }}', '{{ $peminjaman->barang->nama_barang }}', '{{ $peminjaman->peminjam->nama }}')">
                                                    <i class="fas fa-box-archive"></i>
                                                </button>
                                            @endif
                                            <a href="{{ route('peminjaman_barang.show', $peminjaman->id) }}"
                                                class="btn btn-sm btn-success mb-1" data-bs-toggle="tooltip"
                                                title="Show Product">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if ($peminjaman->status === 'Masih dipinjam')
                                                <a href="{{ route('peminjaman_barang.edit', $peminjaman->id) }}"
                                                    class="btn btn-sm btn-warning mb-1" data-bs-toggle="tooltip"
                                                    title="Edit Product">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger mb-1" data-bs-toggle="tooltip"
                                                    title="Delete"
                                                    onclick="hapus('{{ route('peminjaman_barang.destroy', $peminjaman->id) }}', 'Peminjaman Barang')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endif
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
            new DataTable("#tabel-peminjaman-barang")
        })

        // PENGEMBALIAN
        async function barang_kembali(id, barang, peminjam) {
            try {
                const result = await Swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Pastikan barang sudah kembali ke tempat semula.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#aaa",
                    confirmButtonText: "Ya, kembalikan!"
                });

                if (result.isConfirmed) {
                    const response = await axios.patch(`peminjaman_barang/pengembalian/${id}`, {
                        _token: '{{ csrf_token() }}'
                    });

                    if (response.data.success) {
                        await swalTimerSuccess("Barang Dikembalikan!", `Barang ${barang} oleh ${peminjam} telah dikembalikan.`)
                    } else {
                        swalTimerError("Eror", `Gagal menghapus data ${name} ini.`, "error")
                    }
                }
            } catch (error) {
                swalTimerError("Eror", error, "error")
            }
        }
    </script>
@endpush
