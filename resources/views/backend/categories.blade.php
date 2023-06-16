@extends('layouts.app')
@section('title', 'Lagu')
@section('content')
<section class="my-3">
  <div class="row">
    <div class="col">
      <h5>List Lagu</h5>
      <tr>
        <th>Jumlah Data</th>
        <th>{{$category_count}}</th>
      </tr>
    </div>
    <div class="col">
      <div class="d-flex justify-content-end">
        <a href="Category-add" class="btn btn-primary my-1">Tambah Category</a>
      </div>
    </div>
  </div>
  
      <div class="table-responsive">
          <table class="table table-hover">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            @forelse ($categories as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->name}}</td>
              <td>
                <a href="#" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
              </td>
            </tr>
            @empty
              <div class="row alert alert-danger">
                <p>Data Tidak Ada !!!</p>
              </div>
            @endforelse

          </tbody>
          </table>
      </div>
  </section>
@endsection