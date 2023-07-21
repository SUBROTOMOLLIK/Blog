@extends('layouts.backendapp')
@section('content')
      <main>
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Update Post</li>
          </ol>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Update Post
              <a href="{{url('admin/post')}}" class="float-right btn btn-sm btn-dark">All Data</a>
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

                <form method="post" action="{{url('admin/post/'.$post->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <table class="table table-bordered">
                      <tr>
                          <th>Category<span class="text-danger">*</span></th>
                          <td>
                            <div class="row">
                              <div class="col-md-4">
                                <select name="category" class="form-control">
                                  @foreach ($cate as $item)
                                    @if ($item->id == $post->cate_id)
                                        <option value="{{$item->id}}" selected>{{$item->title}}</option>
                                    @else
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endif
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </td>
                      </tr>
                      <tr>
                          <th>Title<span class="text-danger">*</span></th>
                          <td><input type="text" name="title" value="{{$post->title}}" class="form-control" /></td>
                      </tr>
                      <tr>
                          <th>Thumbnail</th>
                          <td>
                            <p class="my-2"><img width="80" src="{{asset('img/thumb')}}/{{$post->thumb}}" /></p>
                            <input type="hidden" value="{{$post->thumb}}" name="post_thumb">
                            <input type="file" name="post_thumb" />
                          </td>
                      </tr>
                      <tr>
                          <th>Full Image</th>
                          <td>
                            <p class="my-2"><img width="80" src="{{asset('img/post')}}/{{$post->full_img}}" /></p>
                            <input type="hidden" value="{{$post->full_img}}" name="post_image">
                            <input type="file" name="post_image" />
                          </td>
                      </tr>
                      <tr>
                          <th>Detail<span class="text-danger">*</span></th>
                          <td>
                            <textarea class="form-control" id="postDetail" name="detail">{{$post->detail}}</textarea>
                          </td>
                      </tr>
                      <tr>
                          <th>Tags</th>
                          <td>
                            <textarea class="form-control" name="tags">{{$post->tags}}</textarea>
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

