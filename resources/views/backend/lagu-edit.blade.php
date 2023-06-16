@extends('layouts.app')
@section('title', 'Lagu')
@section('content')
<section>
  <div class="form-title">
    <h4 class="text-center my-1">Silahkan Ubah Data </h4>
      <form action="/lagu_edit" method="POST" enctype="multipart/form-data">
        @csrf
       @method('PUT')
        <div class="mb-3 form-gorup">
          <input type="hidden" name="lagu_id" value="{{$lagu->id}}">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name"  placeholder="Your Name" value="{{$lagu->name}}">
        </div>
        <div class="mb-3 form-gorup">
          <label for="deskripsi" class="form-label">Descripsi</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control" cols="20" rows="10">{{$lagu->deskripsi}}</textarea>
        </div>
        <div class="mb-3 form-gorup">
          <label for="gambar" class="form-label">Gambar Anda</label>
          <input type="hidden" name="hidden_images_id" class="form-control" id="gambar" value="{{$lagu->images}}">
          <input type="file" name="images" class="form-control" id="gambar" value="{{$lagu->images}}">
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary w-100">Edit</button>
        </div>
      </form>
    </div>
</section>
@endsection