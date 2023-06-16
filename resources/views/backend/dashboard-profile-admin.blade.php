@extends('layouts.app')
@section('title', 'Admin Profile')
@section('content')
 <span class="text-secondary form-label">Selamat datang {{Auth::user()->name}}</span>
  <div class="row">
    <div class="col-6">
      <form action="">
        <div class="mb-3 form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control " name="name" id="name" aria-describedby="name" value="{{Auth::user()->name}}">
        </div>
        <div class="mb-3 form-group">
          <label for="email">email</label>
          <input type="text" class="form-control " name="email" id="email" aria-describedby="email" value="{{Auth::user()->email}}">
        </div>
        <div class="mb-3 form-group">
          <label for="images">images</label>
          <input type="file" class="form-control  " name="images" id="images" aria-describedby="images" value="{{Auth::user()->images}}">
        </div>
        <div class="mb-3 form-group">
          <label for="phone">phone</label>
          <input type="text" class="form-control " name="phone" id="phone" aria-describedby="phone" value="{{Auth::user()->phone}}">
        </div>
        <div class="mb-3 form-group">
          <label for="password">password</label>
          <input type="password" class="form-control " name="password" id="password" aria-describedby="password" value="{{Auth::user()->password}}">
        </div>
        <div class="mb-3 form-group">
          <label for="musik">musik</label>
          <input type="text" class="form-control " name="musik" id="musik" aria-describedby="musik" value="{{Auth::user()->musik}}">
        </div>
        <div class="mb-3 form-group">
          <label for="layani">layani</label>
          <input type="text" class="form-control " name="layani" id="layani" aria-describedby="layani" value="{{Auth::user()->layani}}">
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
    <div class="col-6 text-center">
      <img src="{{Auth::user()->images}}" alt="{{Auth::user()->name}}" width="200px" height="auto">
    </div>
  </div>

@endsection