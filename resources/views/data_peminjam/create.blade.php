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
                <option value="Guru" {{ old("status") === "Guru" ? "selected" : "" }}>Guru</option>
                <option value="Staff" {{ old("status") === "Staff" ? "selected" : "" }}>Staff Tata Usaha</option>
                <option value="Siswa" {{ old("status") === "Siswa" ? "selected" : "" }}>Siswa</option>
              </select>
              @error('status')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3" id="kelas" style="display: none">
              <label for="kelas" class="form-label">Kelas</label>
              <select class="form-select @error('kelas') is-invalid @enderror" aria-label="Default select example" name="kelas">
                <option selected value="-">Pilih Kelas</option>
                <option value="X SIJA 1" {{ old("kelas") === "X SIJA 1" ? "selected" : "" }}>X SIJA 1</option>
                <option value="X SIJA 2" {{ old("kelas") === "X SIJA 2" ? "selected" : "" }}>X SIJA 2</option>
                <option value="XI SIJA 1" {{ old("kelas") === "XI SIJA 1" ? "selected" : "" }}>XI SIJA 1</option>
                <option value="XI SIJA 2" {{ old("kelas") === "XI SIJA 2" ? "selected" : "" }}>XI SIJA 2</option>
                <option value="XII SIJA 1" {{ old("kelas") === "XII SIJA 1" ? "selected" : "" }}>XII SIJA 1</option>
                <option value="XII SIJA 2" {{ old("kelas") === "XII SIJA 2" ? "selected" : "" }}>XII SIJA 2</option>
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
{{-- <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Mendapatkan elemen dropdown status
    var statusDropdown = document.getElementById('status');
      
    // Mendapatkan elemen dengan id "kelas"
    var kelasDiv = document.getElementById('kelas');
      
    // Menambahkan event listener untuk memantau perubahan pada dropdown status
    statusDropdown.addEventListener('change', function () {
      var selectedStatus = statusDropdown.value;
      // Jika status yang dipilih adalah 'siswa', tampilkan label kelas
      if (selectedStatus === 'Siswa') {
        kelasDiv.style.display = 'block';
      } else {
        kelasDiv.style.display = 'none';
      }
    });
    
    // Setel tampilan label kelas saat halaman dimuat
    var initialStatus = statusDropdown.value;
    if (initialStatus === 'Siswa') {
      kelasDiv.style.display = 'block';
    } else {
        kelasDiv.style.display = 'none';
    }
  });

  // // Mendapatkan elemen dropdown status
  // var statusDropdown = document.getElementById('status');

  // // Mendapatkan elemen dengan id "kelas"
  // var kelasDiv = document.getElementById('kelas');

  // // Menambahkan event listener untuk memantau perubahan pada dropdown status
  // statusDropdown.addEventListener('change', function() {
  //   var selectedStatus = statusDropdown.value;

  //   if (selectedStatus === 'siswa') {
  //       kelasDiv.style.display = 'block';
  //   } else {
  //       kelasDiv.style.display = 'none';
  //   }
  // });
</script> --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Mendapatkan elemen dropdown status
    var statusDropdown = document.getElementById('status');
    
    // Mendapatkan elemen dengan id "kelas"
    var kelasDiv = document.getElementById('kelas');
    var kelasSelect = document.querySelector('select[name="kelas"]');
    
    // Menambahkan event listener untuk memantau perubahan pada dropdown status
    statusDropdown.addEventListener('change', function () {
      var selectedStatus = statusDropdown.value;
      
      // Jika status yang dipilih adalah 'Siswa', tampilkan label kelas dan buat kolom kelas wajib diisi
      if (selectedStatus === 'Siswa') {
        kelasDiv.style.display = 'block';
        kelasSelect.setAttribute('required', 'required');
      } else {
        // Jika statusnya bukan 'Siswa', sembunyikan label kelas dan buat kolom kelas tidak wajib diisi
        kelasDiv.style.display = 'none';
        kelasSelect.removeAttribute('required');
      }
    });
    
    // Setel tampilan label kelas saat halaman dimuat
    var initialStatus = statusDropdown.value;
    if (initialStatus === 'Siswa') {
      kelasDiv.style.display = 'block';
      kelasSelect.setAttribute('required', 'required');
    } else {
      kelasDiv.style.display = 'none';
      kelasSelect.removeAttribute('required');
    }
  });
</script>

@endpush