@extends('layouts.app')

@section('container')
<div class="content-wrapper">
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{ route('data_peminjam.update', $data_peminjam->id) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="{{ $data_peminjam->nama }}">
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" aria-label="Default select example" name="status" id="status">
                    <option selected>Pilih Status</option>
                    <option value="guru" {{ $data_peminjam->status === 'guru' ? 'selected' : '' }}>Guru</option>
                    <option value="staff" {{ $data_peminjam->status === 'staff' ? 'selected' : '' }}>Staff Tata Usaha</option>
                    <option value="siswa" {{ $data_peminjam->status === 'siswa' ? 'selected' : '' }}>Siswa</option>
                  </select>
                </div>
                <div class="mb-3" id="kelas" style="{{ $data_peminjam->status === 'siswa' ? '' : 'display: none' }}">
                  <label for="kelas" class="form-label">Kelas</label>
                  <select class="form-select" aria-label="Default select example" name="kelas">
                    <option selected value="-">Pilih Kelas</option>
                    <option value="X SIJA 1" {{ $data_peminjam->kelas === 'X SIJA 1' ? 'selected' : '' }}>X SIJA 1</option>
                    <option value="X SIJA 2" {{ $data_peminjam->kelas === 'X SIJA 2' ? 'selected' : '' }}>X SIJA 2</option>
                    <option value="XI SIJA 1" {{ $data_peminjam->kelas === 'XI SIJA 1' ? 'selected' : '' }}>XI SIJA 1</option>
                    <option value="XI SIJA 2" {{ $data_peminjam->kelas === 'XI SIJA 2' ? 'selected' : '' }}>XI SIJA 2</option>
                    <option value="XII SIJA 1" {{ $data_peminjam->kelas === 'XII SIJA 1' ? 'selected' : '' }}>XII SIJA 1</option>
                    <option value="XII SIJA 2" {{ $data_peminjam->kelas === 'XII SIJA 2' ? 'selected' : '' }}>XII SIJA 2</option>
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