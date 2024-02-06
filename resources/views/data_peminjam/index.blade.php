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
      <div class="d-flex">
        <div class="me-auto bd-highlight">
          <h4 class="fw-bold">
            <i class="nav-icon fa-solid fa-user"></i> {{ $page_title }}
          </h4>
        </div>
        <div class="bd-highlight">
          <a href="{{ route('data_peminjam.create') }}" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-title="Tambah Data">
            <i class="fa fa-plus me-2"></i> Tambah Data
          </a>
        </div>
      </div>
    </div>
      
    <div class="card-body">
      <div class="content-header">
        <div class="table-responsive">
          <table id="data_peminjam" class="table table-striped table-hover">
            <thead class="table-primary">
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Status Peminjam</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data_peminjam as $data)
              <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->kelas }}</td>
                <td>
                  <a href="{{ route("data_peminjam.show", $data->id) }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-title="Show Data">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ route("data_peminjam.edit", $data->id) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-title="Edit Data">
                    <i class="fas fa-edit"></i>
                  </a>
                  <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Delete Data" onclick="hapus('{{ route('data_peminjam.destroy', $data->id) }}', 'Peminjam')">
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
      new DataTable("#data_peminjam");
    })
  </script>
@endpush