<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Musik | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
      .container{
        max-height: 100vh;
      }
      .container .form-content{
        margin: auto;
        width: 45%;
        border: 0.5px solid rgb(207, 200, 200);
        box-shadow: 0.1px 0 0 ;
        border-radius: 5px;
      }
      .container .form-content form{
        padding: 10px;
      }

    </style>
  </head>
  <body>
    <div class="container">
      <div class="d-flex justify-content-center m-2">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('register_failed'))
          <div class="alert alert-danger text-center">
              {{ session('register_failed') }}
          </div>
        @endif
      </div>
      <div class="form-content mb-3">
        <form action="daftar-user" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3 text-center">
            <img src="{{asset('storage/icon/logo_kairos.png')}}" width="100px" height="100px" alt="Kairos Manado">
          </div>
          <div class="mb-3 form-gorup">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name"  placeholder="Your Name" >
          </div>
          <div class="mb-3 form-gorup">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" >
          </div>
          <div class="mb-3 form-gorup">
            <label for="phone" class="form-label">No HP / WA</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone" >
          </div>
          <div class="mb-3 form-gorup">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="pass" placeholder="Your Password" >
          </div>
          <div class="mb-3 form-gorup">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"></textarea>
          </div>
          <div class="mb-3 form-gorup">
            <label for="name" class="form-label">Musik</label>
            <input type="text" name="musik" class="form-control" id="name"  placeholder="Dominan Musik Apa?" >
          </div>
          <div class="mb-3 form-gorup">
            <label for="name" class="form-label">Mau Di Layani?</label>
            <input type="text" name="layani" class="form-control" id="name"  placeholder="Apakah Anda Siap Menjadi Pelayan Tuhan di Kairos?" >
          </div>
          <div class="mb-3 form-gorup">
            <label for="gambar" class="form-label">Gambar Anda</label>
            <input type="file" name="images" class="form-control" id="gambar">
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-100">Register</button>
          </div>
          <div class="d-flex justify-content-center">
            <p>Already account?</p><a class="text-center" href="login">Login</a>
          </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>