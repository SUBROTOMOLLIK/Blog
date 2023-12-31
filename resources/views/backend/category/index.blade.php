@extends('layouts.backendapp') 
@section('meta_des',$meta_des)
@section('title',$title)
@section('content')
   <main>
    <div class="container-fluid">
        <h1 class="mt-4">Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All Category Here</li>
        </ol>
    {{-- session show     --}}
      @if (Session::has('success'))
      <p class="text-success">{{session('success')}}</p>
      @endif
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Categories
      <a href="{{url('admin/category/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($category as $data)
              <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->title}}</td>
                <td>
                  <img src="{{asset("img/catimg/".$data->image)}}" alt="category" width="160px" height="100px"> 
                </td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{ url('admin/category/'. $data->id .'/edit')}}">Update</a>
                  <a  class="btn btn-danger btn-sm" href="{{ url('admin/category/'. $data->id .'/delete')}}">Delete</a>
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
