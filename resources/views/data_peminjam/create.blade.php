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
              <form>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Pilih Status</option>
                    <option value="1">Guru</option>
                    <option value="2">Siswa</option>
                    <option value="3">Staff Tata Usaha</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection