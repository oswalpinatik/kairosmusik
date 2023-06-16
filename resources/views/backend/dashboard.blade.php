@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row my-2" style="max-height: 100vh">
    <div class="col">
      <h4>Selamat Datang {{Auth::user()->name}}</h4>
    </div>
    <div class="col search d-flex justify-content-end">
      <form class="d-flex py-1" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
</div>
<div class="row">
  <div class="col-lg-4">
      <div class="card-data p-1">
          <div class="row shadow p-3 bg-info rounded ">
              <div class="col-6"><i class="bi bi-music-note-list"></i></div>
              <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                  <div class="card-desc">
                      <p>Lagu</p>
                  </div>
                  <div class="card-count">
                      <p>{{$lagu_count}}</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-4">
      <div class="card-data p-1">
          <div class="row shadow p-3 bg-danger rounded ">
              <div class="col-6"><i class="bi bi-list-task"></i></div>
              <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                  <div class="card-desc">
                      <p>Category</p>
                  </div>
                  <div class="card-count">
                      <p>{{$category_count}}</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-4">
      <div class="card-data p-1 ">
          <div class="row shadow p-3 bg-dark-subtle rounded ">
              <div class="col-6"><i class="bi bi-people"></i></div>
              <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                  <div class="card-desc">
                      <p>Users</p>
                  </div>
                  <div class="card-count">
                      <p>{{$user_count}}</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

{{-- Data User --}}
<section class="my-3">
    <h5>List User</h5>
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <td>Image</td>
                <td>Musik</td>
                <td>Di Layani</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($user as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td class="disabled">{{$item->name}}</td>
                @if ($item->name != 'admin')
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td>
                    <img src="{{ Storage::url('public/images/').$item->images }}" width="50px" alt="">
                </td>
                <td>{{$item->musik}}</td>
                <td>{{$item->layani}}</td>
                <td>
                    <form action="status_update/{id}" method="post">
                        <select class="form-select" aria-label="Default select example"  name="status" id="">
                            <option>{{$item->status}}</option>
                            <option value="active">
                                Active
                            <option value="in active">
                                In Active
                            </option>
                        </select>  
                        <button type="submit" class="btn btn-outline-primary w-100">Update</button>
                    </form>
                </td>
            </tr>
            @endif
            @empty
                <div class="row alert alert-danger">
                <p>Data Tidak Ada !!!</p>
                </div>
            @endforelse
            
        </tbody>
        </table>
    </div>
</section>

{{-- Lata Lagu --}}
<section class="my-3">
<h5>List Lagu</h5>
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th class="w-25">Judul Lagu</th>
                <th class="w-25">Image</th>
                <th>Descripsi Lagu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Bapa Kau Setia</td>
                <td>
                    <img src="" alt="....">
                </td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam nostrum quasi ratione commodi qui voluptas facere expedita ipsam? Placeat iusto sunt dignissimos nesciunt nemo itaque distinctio perspiciatis, praesentium officia corrupti? Dolorum esse ipsa ducimus neque, unde veniam architecto dolor quidem rerum ab itaque accusamus ratione sint. Autem consequuntur, beatae optio soluta sint illum deleniti tempora veritatis consectetur dolorem libero alias? Ipsum natus ut totam autem repudiandae vel dolore, fuga commodi qui sit dolorem provident quos corrupti velit ipsam, architecto adipisci magnam animi molestiae iste similique facere ea aliquam quidem. Dolor officia eius distinctio amet delectus tempora nesciunt iure laboriosam expedita.</td>
            </tr>
        </tbody>
        </table>
    </div>
</section>

@endsection