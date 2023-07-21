@extends('layouts/fornt')
@section('title',$data->title)
@section('section')
                {{-- main section --}}
                <main class="container">
                    <div class="row">
                        {{-- session show     --}}
                        @if (Session::has('success'))
                          <p class="text-success">{{session('success')}}</p>
                        @endif
                        <div class="col-md-8">
                                <div class="card">
                                    <h5 class="card-header">
                                        {{$data->title}}
                                        <span class="float-end">views({{$data->views}})</span>
                                    </h5>
                                    <img src="{{url('img/post/'.$data->full_img)}}" class="card-img-top my-1" alt="{{$data->title}}">
                                    <p class="pt-3">
                                    {{-- show Date --}}

                                    <span class="text-muted ms-3">Date: {{$data->created_at->format('d-m-Y')}}</span>
                                    {{-- show Date --}}
                                    {{-- show category --}}
                                    <a class="text-decoration-none" href="{{url('category/'.$data->category->id)}}">
                                    <span class="ps-2">{{$data->category->title}}</span>
                                    </a>
                                    {{-- show category --}}
                                    </p>
                                    <div class="card-body">
                                        <p class="card-text">{!! $data->detail !!}</p>
                                    </div>
                                </div>
                                {{-- add comment --}}
                                @auth
                                <div class="card mt-5">
                                    <h5 class="card-header">Add Comment</h5>
                                    <div class="card-body">
                                        <form action="{{url('submit-comment/'.$data->id)}}" method="post">
                                            @csrf
                                            <textarea name="comment" class="form-control"></textarea>
                                            <input type="submit" class="btn btn-dark mt-2">
                                        </form>
                                    </div>
                                </div>
                                @endauth

                                {{-- Fetch comment --}}
                                <div class="card mt-4">
                                    <h5 class="card-header">Comments <span class="badge bg-dark">{{count($data->comments)}}</span></h5>
                                    <div class="card-body">
                                        @if ($data->comments)
                                            @foreach ($data->comments as $comment)
                                            <figure>
                                                <blockquote class="blockquote">
                                                  <p>{{$comment->comment}}</p>
                                                </blockquote>
                                                @if ($comment->user_id == 0)
                                                <figcaption class="blockquote-footer">
                                                    Admin
                                                </figcaption>
                                                @else
                                                <figcaption class="blockquote-footer">
                                                    {{$comment->user->name}}
                                                </figcaption>
                                                @endif
                                            </figure>
                                            @endforeach
                                        @endif
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
