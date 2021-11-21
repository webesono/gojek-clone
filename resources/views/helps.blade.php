@extends('layouts.main')

@section('container')
<h1 class="mb-5 text-center" style="font-weight:1000;">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-7">
    <form action="{{ route('searchHelp') }}"  method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="What can we help you?"name="searchHelp" value="{{request('searchHelp')}}" style="border-radius: 25px 0px 0px 25px; height: 50px; font-size:20px" required/>
        <button class="btn btn-info text-white" style="font-weight:1000;font-size:20px; border-radius: 0px 25px 25px 0px" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

@if ($helps->count())
<div class="card mb-3" style="border:1px solid lightblue; border-radius: 50px">
    <img src="https://source.unsplash.com/1200x400?{{ $helps[0]->categoryHelp->name }}" class="card-img-top" alt="{{ $helps[0]->categoryHelp->name }}" style="border-radius: 50px">

    <div class="card-body text-center" >
      <h3 class="card-title"><a href="{{url('/helps')}}/{{ $helps[0]->slug }}" class="text-decoration-none text-dark">{{ $helps[0]->title }}</a></h3>

        <p>
            <small class="text-muted">
                 In <a href="{{url('/categoryhelps') }}/{{$helps[0]->categoryHelp->slug}}" class="text-decoration-none">{{ $helps[0]->categoryHelp->name }}</a> {{ $helps[0]->created_at->diffForHumans() }}
            </small>
        </p>
      <p class="card-text">{{ $helps[0]->excerpt }}</p>

      <a href="{{url('/helps')}}/{{ $helps[0]->slug }}" class="text-decoration-none btn btn-primary">Read more..</a>
      
    </div>
  </div>
  

  <div class="container">
    <div class="row">
      @foreach ($helps->skip(1) as $help)
        <div class="col-md-4 mb-4" >
          <div class="card"  style="border:1px solid lightblue; border-radius: 50px" href="{{url('/helps')}}/{{ $help->slug }}">
            <div class="position-absolute p-3 py-2 " style="background-color: rgba(0, 0, 0, 0.7);   border-radius: 250px 50px 50px 50px"><a href="{{url('/categoryhelps')}}/{{ $help->categoryHelp->name }}" class="text-white text-decoration-none">{{ $help->categoryHelp->name }}</a></div>
            <img src="https://source.unsplash.com/500x400?{{ $help->categoryHelp->name }}" class="card-img-top" alt="{{ $help->categoryHelp->name }}" style="border-radius: 50px 50px 5px 5px">
            <div class="card-body">

              <h5 class="card-title"> <a href="{{url('/helps')}}/{{ $help->slug }}" class="text-decoration-none text-dark">{{ $help->title }}</a></h5>
              <p>
                <small class="text-muted">
                    Created at </a> {{ $help->created_at->diffForHumans() }}
                </small>
              </p>
              <p class="card-text "><a href="{{url('/helps')}}/{{ $help->slug }}" class="text-decoration-none text-dark">{{ $help->excerpt }} </a><a href="{{url('/helps')}}/{{ $help->slug }} " class="text-decoration-none">Read more ...</a></p>
              
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  @else
      <p class="text-center fs-4">Sorry, no help found.</p>
  @endif
{{-- <div class="d-flex justify-content-end">
  {{ $helps->links()}}
</div> --}}
@endsection