<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset("assets/bootstrap/css/bootstrap.css") }}">
  <!-- CSS Local -->
  <style>
    body {
      background-color: #265073;
    }
    div.card {
      box-shadow: 0 4px 30px 0 rgba(0, 0, 0, 0.2);
    }
  </style>
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 mt-5 mx-auto">
        {{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Please Login!</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
        <div class="card">
          <div class="card-body">
            <img src="{{ asset("assets/img/logo.png") }}" alt="logo sekolah" class="mb-3 mx-auto d-block" width="70">
            <div class="text-center">
              <h3>Inventori Barang</h3>
              <p>SMK Negeri 69 Jakarta</p>
            </div>
            <form action="{{ route("login.store") }}" method="post">
              @csrf
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
                <label for="floatingInput">Username</label>
                @error('username')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <button class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>