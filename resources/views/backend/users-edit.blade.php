@extends('layouts.app')
@section('title', 'Users')
@section('content')
@if (session('user_update'))
<div class="alert alert-danger text-center">
    {{ session('user_update') }}
</div>
@endif
  <div class="row">
    <h4>Edit Users</h4>
    <div class="col-6">
      <form action="/users_update" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="hidden_id" value="{{$user->id}}">
        <div class="mb-3 form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control " name="name" id="name" aria-describedby="name" value="{{$user->name}}">
        </div>
        <div class="mb-3 form-group">
          <label for="email">email</label>
          <input type="text" class="form-control " name="email" id="email" aria-describedby="email" value="{{$user->email}}">
        </div>
        <div class="mb-3 form-group">
          <label for="images">images</label>
          <input type="hidden" name="hidden_product_images" value="{{$user->images}}">
          <input type="file" class="form-control" name="images" id="images" value="{{$user->images}}">
        </div>
        <div class="mb-3 form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat"  id="alamat" cols="30" rows="10" class="form-control  " name="alamat" id="alamat" aria-describedby="alamat" value="{{$user->alamat}}">{{$user->alamat}}</textarea> 
        </div>
        <div class="mb-3 form-group">
          <label for="phone">phone</label>
          <input type="text" class="form-control " name="phone" id="phone" aria-describedby="phone" value="{{$user->phone}}">
        </div>
        <div class="mb-3 form-group">
          <label for="password">password</label>
          <input type="password" class="form-control " name="password" id="password" aria-describedby="password" value="{{$user->password}}">
        </div>
        <div class="mb-3 form-group">
          <label for="musik">musik</label>
          <input type="text" class="form-control " name="musik" id="musik" aria-describedby="musik" value="{{$user->musik}}">
        </div>
        <div class="mb-3 form-group">
          <label for="layani">layani</label>
          <input type="text" class="form-control " name="layani" id="layani" aria-describedby="layani" value="{{$user->layani}}">
        </div>
        <div class="mb-3 form-group">
          <label for="status">Status</label>
          <select class="form-select" aria-label="Default select example"  name="status" id="">
            <option>{{$user->status}}</option>
            <option value="active">Active</option>
            <option value="in active">In Active</option>
          </select>  
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
    <div class="col-6 text-center d-block">
      <div>
       <img src="{{asset('images/'.$user->images)}}" alt="Gambar" width="100px" height="auto">
      </div>
      <small>{{$user->name}}</small>
    </div>
  </div>

@endsection