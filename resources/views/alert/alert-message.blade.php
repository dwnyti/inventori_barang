@if(session()->has('successCreateData'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data Berhasil Ditambahkan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('successEditData'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data Berhasil Diedit
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('successDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Data tidak berhasil diedit
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif