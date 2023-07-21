@extends('layouts/fornt')
@section('title','Manage Post')
@section('section')
                {{-- main section --}}
                <main class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                            <div class="card-header">
                                <h5>Manage Post</h5> 
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
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <th>#</th>
                                          <th>Title</th>
                                          <th>Thumb-Img</th>
                                          <th>Full-Image</th>
                                          <th>detail</th>
                                        </tr>
                                      </tfoot>
                                      <tbody>
                                          @if (count($data) > 0)
                                            @foreach ($data as $post)
                                            <tr>
                                                <td>{{$post->id}}</td>
                                                <td>{{$post->title}}</td>
                                                <td>
                                                <img src="{{url('img/thumb/'.$post->thumb)}}" alt="thumb image" width="120px">
                                                </td>
                                                <td>
                                                <img src="{{url('img/post/'.$post->full_img)}}" alt="full image" width="120px">
                                                </td>
                                                <td>{{ Str::limit(strip_tags($post->detail), 80) }}</td>
                                            </tr>
                                            @endforeach
                                          @else
                                            <p class="text-center">No Post Available</p>
                                          @endif
                                      </tbody>
                                    </table>
                                  </div>
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
                                <h5 class="card-header ">Popular Post</h5>                        
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