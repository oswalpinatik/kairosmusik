@extends('layouts.app')
@section('title', 'Users')
@section('content')
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
                  <td>Aksi</td>
              </tr>
          </thead>
          <tbody>
            @forelse ($user as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->name}}</td>
              @if ($item->name != 'admin')
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td>
                    <img src="{{ asset('images/'.$item->images) }}" width="50px" alt="">
                </td>
                <td>{{$item->musik}}</td>
                <td>{{$item->layani}}</td>
                <td>
                    <form action="status_update" method="post">
                        <select class="form-select" aria-label="Default select example"  name="status" id="">
                            <option>{{$item->status}}</option>
                            <option value="active">
                                <button type="submit">Active</button></option>
                            <option value="in active">
                                <button type="submit">In Active</button>
                            </option>
                        </select>  
                    </form>
                </td>
                <td>
                <a href="users_edit/{{$item->id}}" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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
@endsection