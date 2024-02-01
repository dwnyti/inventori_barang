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
          <a href="{{ route('data_peminjam.create') }}" class="btn btn-warning">
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
                <th scope="col">Status</th>
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
                  <a href="" class="btn btn-success" data-bs-toggle="tooltip" title="Show">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ route('data_peminjam.edit', $data->id) }}" class="btn btn-warning" data-bs-toggle="tooltip" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <button class="btn btn-danger" data-bs-toggle="tooltip" title="Delete" onclick="hapus('{{ $data->id }}')">
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
            url: '/data_peminjam/' + id, // Sesuaikan dengan URL delete di controller Anda
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