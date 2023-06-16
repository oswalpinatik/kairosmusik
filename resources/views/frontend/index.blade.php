@extends('layouts.main')
@section('title', 'Home')
@section('content')
  <div class="container-fluid">
    <div class="row m-3">
      <h5>Category</h5>
      <div class="col-lg">
        <div class="row">
          @forelse ($user as $item)
          <div class="col-lg-3 d-flex justify-content-center p-2">
            <div class="card " style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <div class="card-title">
                  <h5>{{$item->name}}</h5>
                </div>
                <p class="card-text">{{$item->email}}</p>
              </div>
            </div>
          </div>
          @empty
            <p class="alert alert-danger">Masih Kosong</p>
          @endforelse
        </div>
      </div>
    </div>
    <h5>Data Story</h5>
    <div class="row m-3">
      <div class="col-lg">
        <div class="row">
          <div class="col-lg-3 d-flex justify-content-center p-2">
            <div class="card " style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 d-flex justify-content-center p-2">
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 d-flex justify-content-center p-2">
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 d-flex justify-content-center p-2">
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection