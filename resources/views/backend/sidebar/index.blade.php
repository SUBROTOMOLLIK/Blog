@extends('layouts.backendapp')
@section('meta_des',$meta_des)
@section('title',$title)
@section('content')
   <main>
    <div class="container-fluid">
        <h1 class="mt-4">Sidebar</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">All Sidebar Here</li>
        </ol>
    {{-- session show     --}}
      @if (Session::has('success'))
      <p class="text-success">{{session('success')}}</p>
      @endif
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Sidebars
      <a href="{{url('admin/sidebar/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Image</th>
              <th>Detail</th>
              <th>Value</th>
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
            @foreach ($sidebar as $data)
              <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->title}}</td>
                <td>
                  <img src="{{asset("img/sidebar_img/".$data->image)}}" alt="sidebar" width="160px" height="100px">
                </td>
                <td>{{$data->detail}}</td>
                <td>{{$data->value}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{ url('admin/sidebar/'. $data->id .'/edit')}}">Update</a>
                  <a  class="btn btn-danger btn-sm" href="{{ url('admin/sidebar/'. $data->id .'/delete')}}">Delete</a>
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
