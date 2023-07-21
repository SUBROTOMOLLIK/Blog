   @extends('layouts/fornt')
    @section('section')
                {{-- main section --}}
                <main class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-3">
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <h5>Add Post</h5> 
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

                <form method="post" action="{{url('save_post')}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
                      <tr>
                          <th>Category<span class="text-danger">*</span></th>
                          <td>
                            <div class="row">
                              <div class="col-md-4">
                                <select name="category" class="form-control">
                                  <option value="" selected>select category</option>
                                  @foreach ($cate as $item)
                                     <option value="{{$item->id}}">{{$item->title}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </td>
                      </tr>
                      <tr>
                          <th>Title<span class="text-danger">*</span></th>
                          <td><input type="text" name="title" class="form-control" /></td>
                      </tr>
                      <tr>
                          <th>Thumbnail</th>
                          <td><input type="file" name="post_thumb" /></td>
                      </tr>
                      <tr>
                          <th>Full Image</th>
                          <td><input type="file" name="post_image" /></td>
                      </tr>
                      <tr>
                          <th>Detail<span class="text-danger">*</span></th>
                          <td>
                            <textarea class="form-control" name="detail"></textarea>
                          </td>
                      </tr>
                      <tr>
                          <th>Tags</th>
                          <td>
                            <textarea class="form-control" name="tags"></textarea>
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
            </div>
                {{-- search option --}}
                <div class="col-md-4">
                    <div class="card mb-4">
                        <h5 class="card-header">Search</h5>                        
                        <div class="card-body">
                            <form action="{{url('/')}}">
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control" name="q" placeholder="Search Title" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark" type="button">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- Recent post --}}
                    <div class="card mb-4">
                        <h5 class="card-header">Recent Post</h5>                        
                        <div class="list-group list-group-flush">
                             @if ($recent_post)
                            @foreach ($recent_post as $post)
                                <a href="{{url('detail/'.$post->id)}}" class="list-group-item">{{$post->title}}</a>
                            @endforeach
                            @endif  
                                    
                    </div>
                            </div>
                            {{-- popular post --}}
                            <div class="card mb-4">
                                <h5 class="card-header">Popular Post</h5>                        
                                <div class="list-group list-group-flush">
                                    @if ($popular_post)
                                    @foreach ($popular_post as $post)
                                      <a href="{{url('detail/'.$post->id)}}" class="list-group-item">{{$post->title}} <span class="badge bg-secondary">{{$post->views}}</span></a>
                                    @endforeach
                                    @endif  
                                </div>
                            </div>
                            {{-- popular post --}}
                        </div>
                    </div>
                </main>
                {{-- main section --}}
    @endsection


