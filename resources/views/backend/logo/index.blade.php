@extends('layouts.backendapp') 
{{-- @section('meta_des',$meta_des)
@section('title',$title) --}}
@section('content')
   <main>
    <div class="container-fluid">
        <h1 class="mt-4">Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All Posts Here</li>
        </ol>
    {{-- session show     --}}
      @if (Session::has('success'))
      <p class="text-success">{{session('success')}}</p>
      @endif
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Posts
      <a href="{{url('admin/post/create')}}" class="float-right btn btn-sm btn-dark">Add Post</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Thumb-Img</th>
              <th>Full-Image</th>
              <th>detail</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Thumb-Img</th>
              <th>Full-Image</th>
              <th>detail</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($data as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>
                  <img src="{{url('img/thumb/'.$item->thumb)}}" alt="thumb image" width="120px">
                </td>
                <td>
                  <img src="{{url('img/post/'.$item->full_img)}}" alt="full image" width="120px">
                </td>
                <td>{{$item->detail}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{ url('admin/post/'. $item->id .'/edit')}}">Update</a>
                  <a  class="btn btn-danger btn-sm" href="{{ url('admin/post/'. $item->id .'/delete')}}">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
    </div>
   </main>
@endsection    
