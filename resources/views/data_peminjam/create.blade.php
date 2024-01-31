@extends('layouts.app')

@section('container')
<div class="content-wrapper">
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Data</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{ route('data_peminjam.store') }}">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" aria-label="Default select example" name="status" id="status">
                    <option selected>Pilih Status</option>
                    <option value="guru">Guru</option>
                    <option value="staff">Staff Tata Usaha</option>
                    <option value="siswa">Siswa</option>
                  </select>
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
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script>
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