@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="{{ route('search') }}"  method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Something?"name="search" value="{{request('search')}}" style="border-radius: 25px 0px 0px 25px" required/>
        <button class="btn btn-info text-white" type="submit" style="border-radius: 0px 25px 25px 0px">Cari</button>
      </div>
    </form>
  </div>
</div>

@if ($posts->count())
<div class="card mb-3" style="border:1px solid lightblue; border-radius: 50px">
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}" style="border-radius: 50px">

    <div class="card-body text-center" >
      <h3 class="card-title"><a href="{{url('/posts')}}/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>

        <p>
            <small class="text-muted">
                 By <a href="{{url('/author')}}/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="{{url('/categories') }}/{{$posts[0]->category->slug}}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
            </small>
        </p>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>

      <a href="{{url('/posts')}}/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more..</a>
      
    </div>
  </div>
  

  <div class="container">
    <div class="row">
      @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-4" >
          <div class="card"  style="border:1px solid lightblue; border-radius: 50px" href="{{url('/posts')}}/{{ $post->slug }}">
            <div class="position-absolute p-3 py-2 " style="background-color: rgba(0, 0, 0, 0.7);   border-radius: 250px 50px 50px 50px"><a href="{{url('/categories')}}/{{ $post->category->name }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" style="border-radius: 50px 50px 5px 5px">
            <div class="card-body">

              <h5 class="card-title"> <a href="{{url('/posts')}}/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
              <p>
                <small class="text-muted">
                    By <a href="{{url('/author')}}/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                    </a> {{ $post->created_at->diffForHumans() }}
                </small>
              </p>
              <p class="card-text "><a href="{{url('/posts')}}/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->excerpt }} </a><a href="{{url('/posts')}}/{{ $post->slug }} " class="text-decoration-none">Read more ...</a></p>
              
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  @else
      <p class="text-center fs-4">No post found</p>
  @endif
{{-- <div class="d-flex justify-content-end">
  {{ $posts->links()}}
</div> --}}
@endsection
