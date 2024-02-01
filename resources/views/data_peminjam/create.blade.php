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
      <form action="{{ route('data_peminjam.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old("nama") }}" placeholder="Input Nama...">
              @error('nama')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select @error('status') is-invalid @enderror" aria-label="Default select example" name="status" id="status">
                <option selected>Pilih Status</option>
                <option value="guru">Guru</option>
                <option value="staff">Staff Tata Usaha</option>
                <option value="siswa">Siswa</option>
              </select>
              @error('status')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3" id="kelas" style="display: none">
              <label for="kelas" class="form-label">Kelas</label>
              <select class="form-select" aria-label="Default select example" name="kelas">
                <option selected value="-">Pilih Kelas</option>
                <option value="X SIJA 1">X SIJA 1</option>
                <option value="X SIJA 2">X SIJA 2</option>
                <option value="XI SIJA 1">XI SIJA 1</option>
                <option value="XI SIJA 2">XI SIJA 2</option>
                <option value="XII SIJA 1">XII SIJA 1</option>
                <option value="XII SIJA 2">XII SIJA 2</option>
              </select>
              @error('kelas')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
        <div>
      </form>
    </div>
    <div class="card-footer">
      <a href="{{ route('data_peminjam.index') }}" class="btn btn-sm btn-secondary me-2">
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
  // $('.js-example-basic-single').select2({
  //   placeholder: 'Select an option'
  // });
  // $(".js-example-basic-single").select2({
  //   maximumSelectionLength: 2
  // });
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

  // Mendapatkan elemen dropdown status
  var statusDropdown = document.getElementById('status');

  // Mendapatkan elemen dengan id "kelas"
  var kelasDiv = document.getElementById('kelas');

  // Menambahkan event listener untuk memantau perubahan pada dropdown status
  statusDropdown.addEventListener('change', function() {
    var selectedStatus = statusDropdown.value;

    if (selectedStatus === 'siswa') {
        kelasDiv.style.display = 'block';
    } else {
        kelasDiv.style.display = 'none';
    }
  });
</script>
@endpush