@extends('layouts.app')

@section('container')
<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary">
      <h4 class="fw-bold">
        <i class="nav-icon fa-solid fa-user"></i> {{ $page_title }}
      </h4>
    </div>
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ $data_peminjam->nama }}" disabled>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-control" aria-label="Default select example" name="status" id="status" disabled>
                <option selected>Pilih Status</option>
                <option value="Guru" {{ $data_peminjam->status}}>Guru</option>
                <option value="Staff Tata Usaha" {{ $data_peminjam->status === 'Staff Tata Usaha' ? 'selected' : '' }}>Staff Tata Usaha</option>
                <option value="Siswa" {{ $data_peminjam->status === 'Siswa' ? 'selected' : '' }}>Siswa</option>
              </select>
            </div>
            <div class="mb-3" id="kelas" style="{{ $data_peminjam->status === 'Siswa' ? '' : 'display: none' }}">
              <label for="kelas" class="form-label">Kelas</label>
              <select class="form-control" aria-label="Default select example" name="kelas" disabled>
                <option value="" style="display: none"></option>
                <option value="" selected disabled>Pilih Kelas</option>
                <option value="X SIJA 1" {{ $data_peminjam->kelas === 'X SIJA 1' ? 'selected' : '' }}>X SIJA 1</option>
                <option value="X SIJA 2" {{ $data_peminjam->kelas === 'X SIJA 2' ? 'selected' : '' }}>X SIJA 2</option>
                <option value="XI SIJA 1" {{ $data_peminjam->kelas === 'XI SIJA 1' ? 'selected' : '' }}>XI SIJA 1</option>
                <option value="XI SIJA 2" {{ $data_peminjam->kelas === 'XI SIJA 2' ? 'selected' : '' }}>XI SIJA 2</option>
                <option value="XII SIJA 1" {{ $data_peminjam->kelas === 'XII SIJA 1' ? 'selected' : '' }}>XII SIJA 1</option>
                <option value="XII SIJA 2" {{ $data_peminjam->kelas === 'XII SIJA 2' ? 'selected' : '' }}>XII SIJA 2</option>
              </select>
            </div>
          </div>
        <div>
      </form>
    </div>
    <div class="card-footer">
      <a href="{{ route('data_peminjam.index') }}" class="btn btn-sm btn-secondary me-2">
        <i class="fa fa-arrow-left me-2"></i> Kembali
      </a>
    </div>
  </div>
</div> 
@endsection