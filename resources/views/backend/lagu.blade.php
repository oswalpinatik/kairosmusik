@extends('layouts.app')
@section('title', 'Lagu')
@section('content')
<section class="my-3">
  <div class="row">
    <div class="col">
      <h5>List Lagu</h5>
    </div>
    <div class="col">
      <div class="d-flex justify-content-end">
        <a href="lagu-add" class="btn btn-primary my-1">Tambah Lagu</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md">
      @if (session('lagu_delete'))
        <div class="alert alert-success text-center">
            {{ session('lagu_delete') }}
        </div>
      @endif
      @if (session('lagu_update'))
      <div class="alert alert-success text-center">
          {{ session('lagu_update') }}
      </div>
      @endif
      @if (session('lagu_add'))
      <div class="alert alert-success text-center">
          {{ session('lagu_add') }}
      </div>
      @endif
    </div>
  </div>
  
      <div class="table-responsive">
          <table class="table table-hover">
          <thead>
              <tr>
                  <th>No</th>
                  <th class="w-25">Judul Lagu</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Descripsi Lagu</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            @forelse ($lagu as $lg)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$lg->name}}</td>
              <td>
                <img src="{{ asset('images/lagu/'.$lg->images)}}" width="50px" alt="">
              </td>
              <td>
                @foreach ($lg->categories as $category)
                    {{$category->name}}
                @endforeach
              </td>
              <td>{{$lg->deskripsi}}</td>
              <td class="d-flex">
                <a href="lagu_edit/{{$lg->id}}" class="btn btn-primary"><i class="bi bi-pen"></i></a>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="bi bi-trash"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body d-block ">
                        <span>Apakah anda yakin ingin menghapus {{$lg->name}} ?</span>
                      </div>
                      <div class="modal-footer">
                        <form action="/lagu_delete/{{$lg->id}}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('delete')
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
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

  

  <script>
    window.deleteConfirm = function (e){
      e.preventDefault();
      var form = e.target.form;
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            form.submit();
          )
        }
    })
      }
  </script>
  
@endsection