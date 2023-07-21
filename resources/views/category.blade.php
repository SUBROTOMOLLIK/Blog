   @extends('layouts/fornt')
    @section('section')
                {{-- main section --}}
                <main class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-3">
                            @if (count($data)>0)
                                @foreach ($data as $item)
                                    <div class="col-md-4">
                                        <a class="text-decoration-none" href="{{url('detail/'.$item->id)}}">
                                        <div class="card">
                                            <img src="{{url('img/thumb/'.$item->thumb)}}" class="card-img-top" alt="{{$item->title}}">
                                            
                                            <div class="card-body">
                                                <h5 class="card-title">{{$item->title}}</h5>
                                                {{-- show Date --}}
                                                <span class="text-muted pe-2">{{$item->created_at->format('d-m-Y')}}</span>
                                                {{-- show Date --}}
                                                {{-- show category --}}
                                                <span class="text-muted">{{$item->category->title}}</span>
                                                {{-- show category --}}
                                                <p class="card-text text-dark mt-2">{{ Str::limit(strip_tags($item->detail), 80) }}</p>
                                                <a href="{{url('detail/'.$item->id)}}" class="btn btn-primary my-2">Reading Continue</a>
                                            </div>
                                        </div>
                                        </a>
                                    </div> 
                                @endforeach
                            @else
                              <p>No Page Found</p>   
                            @endif 
                            </div>
                            {{-- pagination links --}}
                            {{ $data->links() }}
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


