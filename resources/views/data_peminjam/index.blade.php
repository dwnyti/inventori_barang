@extends('layouts.app')

@section('container')
<div class="content-wrapper">
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Peminjam</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <a href="{{ route('data_peminjam.create') }}" type="button" class="btn btn-success mb-3 float-right"><i class="fa-solid fa-plus mr-2"></i> Add Data</a>
          <table class="table table-bordered">
            <thead>
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
                <tr>
                  <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->status }}</td>
                  <td>{{ $data->kelas }}</td>
                  <td class="text-center">
                    <a href="{{ route('data_peminjam.show', $data->id) }}" class="btn btn-success" title="show"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('data_peminjam.edit', $data->id) }}" class="btn btn-warning" title="edit"><i class="fa-solid fa-pen"></i></a>
                    <button type="button" class="btn btn-danger" title="delete" onclick="hapus()"><i class="fa-solid fa-trash"></i></button>
                  </td>
                </tr> 
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script>
  import Swal from 'sweetalert2';
  function hapus() {
    Swal.fire("SweetAlert2 is working!");
  }
</script>
@endpush