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
          <a href="{{ route('data_peminjam.create') }}" type="button" class="btn btn-success mb-3 float-right">Add Data</a>
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
              <tr>
                <th scope="row" class="text-center">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td class="text-center">
                  <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen"></i></button>
                  <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection