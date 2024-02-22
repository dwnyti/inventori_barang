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
      <h4 class="fw-bold">
        <i class="nav-icon fa-solid fa-user"></i> {{ $page_title }}
      </h4>
    </div>
    <div class="card-body">
      <form action="{{ route('data_peminjam.update', $data_peminjam->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $data_peminjam->nama }}">
              @error('nama')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select @error('status') is-invalid @enderror" aria-label="Default select example" name="status" id="status">
                <option selected>Pilih Status</option>
                <option value="Guru" {{ $data_peminjam->status === 'Guru' ? 'selected' : '' }}>Guru</option>
                <option value="Staff Tata Usaha" {{ $data_peminjam->status === 'Staff Tata Usaha' ? 'selected' : '' }}>Staff Tata Usaha</option>
                <option value="Siswa" {{ $data_peminjam->status === 'Siswa' ? 'selected' : '' }} {{ old("status") === "Siswa" ? "Selected" : ""  }}>Siswa</option>
              </select>
              @error('status')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3" id="kelas_id" style="{{ $data_peminjam->status === 'Siswa' ? '' : 'display: none' }}">
              <label for="kelas_id" class="form-label">Kelas</label>
              <select class="form-select" aria-label="Default select example" name="kelas_id">
                <option value="" style="display: none"></option>
                <option value="" selected disabled>Pilih Kelas</option>
                @foreach ($kelas_data as $kelas)
                  <option value="{{ $kelas->id }}" {{ $kelas->id == $data_peminjam->id ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
                @endforeach
              </select>
              @error('kelas_id')
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
  document.addEventListener('DOMContentLoaded', function () {
    // Mendapatkan elemen dropdown status
    var statusDropdown = document.getElementById('status');
      
    // Mendapatkan elemen dengan id "kelas"
    var kelasDiv = document.getElementById('kelas_id');
      
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
</script>
@endpush