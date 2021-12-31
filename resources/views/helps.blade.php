@extends('layouts.main')

@section('container')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{url('/help')}}">Help</a></li>
    </ol>
    <h2 class="mb-3">{{ $title }}</h2>

  </div>
</section><!-- End Breadcrumbs -->
<h1 class="mb-5 py-7 text-center" style="font-weight:1000;">{{ $title }}</h1>

<div class="row justify-content-center mb-5">
  <div class="col-md-7">
    <form action="{{ route('searchHelp') }}"  method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="What can we help you?"name="searchHelp" value="{{request('searchHelp')}}" style="border-radius: 25px 0px 0px 25px; height: 50px; font-size:20px" required/>
        <button class="btn btn-success text-white" style="font-weight:1000;font-size:20px; border-radius: 0px 25px 25px 0px" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>


@if ($helps->count())
<div class="card mb-3" style="border:1px solid #18d26e; border-radius: 50px">
  @if ($helps[0]->helpImage)
  <div style="max-height: 350px; overflow:hidden">
    <img style="border-radius: 50px 50px 0px 0px" src="{{ asset('public/storage/' . $helps[0]->helpImage) }}" alt="{{ $helps[0]->categoryHelp->name }}" class="img-fluid">
  </div>
  @else
  <img src="https://source.unsplash.com/1200x400?{{ $helps[0]->categoryHelp->name }}" class="card-img-top" alt="{{ $helps[0]->categoryHelp->name }}" style="border-radius: 50px">
  @endif
  
  

    <div class="card-body text-center" >
      <h3 class="card-title"><a href="{{url('/helps')}}/{{ $helps[0]->slug }}" class="text-decoration-none text-dark">{{ $helps[0]->judul }}</a></h3>

        <p>
            <small class="text-muted">
                 In <a href="{{url('/categoryhelps') }}/{{$helps[0]->categoryHelp->slug}}" class="text-decoration-none">{{ $helps[0]->categoryHelp->name }}</a> {{ $helps[0]->created_at->diffForHumans() }}
            </small>
        </p>
      <p class="card-text">{{ $helps[0]->excerpt }}</p>
      <div class="read-more" style="
        display: inline-block;
        background: #fff;
        color: #333333;
        padding: 6px 30px 8px 30px;
        transition: 0.3s;
        font-size: 14px;
        border-radius: 50px;
        border: 2px solid #18d26e;" >
        <a href="{{url('/helps')}}/{{ $helps[0]->slug }}">Read more..</a>
      </div>
      
      
    </div>
  </div>
  

  <div class="container">
    <div class="row">
      @foreach ($helps->skip(1) as $help)
        <div class="col-md-4 mb-4" >
          <div class="card"  style="border:1px solid #18d26e; border-radius: 50px" href="{{url('/helps')}}/{{ $help->slug }}">
            <div class="position-absolute p-3 py-2 " style="background-color: rgba(0, 0, 0, 0.7);   border-radius: 250px 50px 50px 50px"><a href="{{url('/categoryhelps')}}/{{ $help->categoryHelp->name }}" class="text-white text-decoration-none">{{ $help->categoryHelp->name }}</a></div>
            @if ($help->helpImage)
              <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('public/storage/' . $help->helpImage) }}" alt="{{ $help->categoryHelp->name }}"  class="card-img-top" alt="{{ $help->categoryHelp->name }}" style="border-radius: 50px 50px 5px 5px">
              </div>
            @else
            <img src="https://source.unsplash.com/500x400?{{ $help->categoryHelp->name }}" class="card-img-top" alt="{{ $help->categoryHelp->name }}" style="border-radius: 50px 50px 5px 5px">
            @endif
            
            <div class="card-body">

              <h5 class="card-title"> <a href="{{url('/helps')}}/{{ $help->slug }}" class="text-decoration-none text-dark">{{ $help->judul }}</a></h5>
              <p>
                <small class="text-muted">
                  In <a href="{{url('/categoryhelps') }}/{{$help->categoryHelp->slug}}" class="text-decoration-none">{{ $help->categoryHelp->name }}</a> {{ $help->created_at->diffForHumans() }}
                </small>
              </p>
              <p class="card-text "><a href="{{url('/helps')}}/{{ $help->slug }}" class="text-decoration-none text-dark">{{ $help->excerpt }} </a></p>
              <div class="read-more" style="
                    display: inline-block;
                    background: #fff;
                    color: #333333;
                    padding: 6px 30px 8px 30px;
                    transition: 0.3s;
                    font-size: 14px;
                    border-radius: 50px;
                    border: 2px solid #18d26e;" >
                    <a href="{{url('/helps')}}/{{ $help->slug }} ">Read more ...</a>
                  </div>
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