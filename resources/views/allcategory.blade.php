   @extends('layouts/fornt')
    @section('section')
                {{-- main section --}}
                <main class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                            @if (count($categories)>0)
                                @foreach ($categories as $category)
                                    <div class="col-md-4">
                                        <a class="text-decoration-none" href="{{url('category/'.$category->id)}}">
                                        <div class="card mb-2">
                                            <img src="{{url('img/catimg/'.$category->image)}}" style="width:auto; height:35vh" class="card-img-top" alt="{{$category->title}}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$category->title}}</h5>
                                                <p class="card-text text-dark mt-2">{{ Str::limit(strip_tags($category->detail), 80) }}</p>
                                            </div>
                                        </div>
                                        </a>
                                    </div> 
                                @endforeach
                            @else
                     -           <p>No Category Found</p>  
                            @endif
                            </div>
                            {{-- pagination links --}}
                            {{ $categories->links() }}
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


