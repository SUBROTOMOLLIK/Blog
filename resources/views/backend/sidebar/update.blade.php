@extends('layouts.backendapp')
@section('content')
      <main>
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Update Sidebar
              <a href="{{url('admin/sidebar')}}" class="float-right btn btn-sm btn-dark">All Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if($errors)
                  @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                  @endforeach
                @endif

                @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
                @endif

                <form method="post" action="{{url('admin/sidebar/'.$sidebar->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <table class="table table-bordered">
                      <tr>
                          <th>Title</th>
                          <td><input type="text" name="title" value="{{$sidebar->title}}" class="form-control" /></td>
                      </tr>
                      <tr>
                          <th>Detail</th>
                          <td><input type="text" name="detail" value="{{$sidebar->detail}}" class="form-control" /></td>
                      </tr>
                      <tr>
                        <p class="my-2">
                            <img width="80" src="{{asset('img/sidebar_img/'.$sidebar->image)}}" />
                        </p>
                        <input type="hidden" value="{{$sidebar->image}}" name="sidebar_image" />
                        <input type="file" name="sidebar_image" />
                      </tr>
                      <tr>
                        <th>Select Value</th>
                        <td>
                        <select class="form-control" name="value" >
                            <option value="1" {{($sidebar->value == '1') ? 'Selected' : ''}}>Show</option>
                            <option value="2" {{($sidebar->value == '2') ? 'Selected' : ''}}>Hide</option>
                        </select>
                        </td>
                      </tr>
                      <tr>
                          <td colspan="2">
                              <input type="submit" class="btn btn-primary" />
                          </td>
                      </tr>
                  </table>
                </form>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
      </main>
        <!-- /.container-fluid -->
@endsection

