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
              <i class="fas fa-table"></i> Add Sidebar
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

                <form method="post" action="{{url('admin/sidebar')}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
                      <tr>
                          <th>Title <span class="text-danger">*</span></th>
                          <td><input type="text" name="title" class="form-control" /></td>
                      </tr>
                      <tr>
                        <th>Image</th>
                        <td><input type="file" name="sidebar_image" /></td>
                    </tr>
                    <tr>
                        <th>Select Value</th>
                        <td>
                        <select class="form-control" name="value" aria-label="Default select example">
                            <option selected value="1">Show</option>
                            <option value="2">Hide</option>
                        </select>
                        </td>
                    </tr>
                      <tr>
                          <th>Detail <span class="text-danger">*</span></th>
                          <td><textarea type="text" name="detail" class="form-control"></textarea></td>
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

