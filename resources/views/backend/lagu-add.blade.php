@extends('layouts.app')
@section('title', 'Lagu')
@section('content')
<section>
  <div class="form-title">
    <h4 class="text-center">Silahkan Menambahkan Data Baru</h4>
      <form action="lagu-add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 form-gorup">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name"  placeholder="Your Name" >
        </div>
        <div class="mb-3 form-gorup">
          <label for="deskripsi" class="form-label">Descripsi</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control" cols="20" rows="10"></textarea>
        </div>
        <div class="mb-3 form-group">
          <label for="status">Cataegory</label>
          <select  name="category[]" class="form-select" aria-label="Default select example"  >
            @foreach ($category as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
           
          </select>  
        </div>
        <div class="mb-3 form-gorup">
          <label for="gambar" class="form-label">Gambar Anda</label>
          <input type="file" name="images" class="form-control" id="gambar" >
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary w-100">Tambahkan</button>
        </div>
      </form>
    </div>
</section>

@endsection