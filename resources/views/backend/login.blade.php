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
        margin: 5% auto;
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
  <body class="bg-light bg-gradient">   
    <div class="container">

      <div class="form-content shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex justify-content-center">
          @if (session('failed'))
            <div class="alert alert-danger text-center">
                {{ session('failed') }}
            </div>
          @endif
          @if (session('register_success'))
            <div class="alert alert-success text-center">
                {{ session('register_success') }}
            </div>
          @endif
          @if (session('invalid_login'))
            <div class="alert alert-danger text-center">
                {{ session('invalid_login') }}
            </div>
          @endif
        </div>
        <form class="" action="login" method="POST">
          @csrf
          <div class="mb-3 text-center">
            <img src="{{asset('storage/icon/logo_kairos.png')}}" width="100px" height="100px" alt="Kairos Manado">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Your Password" required>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </div>
          <div class="d-flex justify-content-center">
            <p>Join with us?</p><a class="text-center" href="daftar">Daftar</a>
          </div>
        </form>
      </div>
    </div>
    @if ($message = Session::get('invalid_login'))
        <script type="">
          Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '$message',
        footer: '<a href="">Why do I have this issue?</a>'
      })
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    

     

  </body>
</html>