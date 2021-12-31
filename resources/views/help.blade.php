@extends('layouts.main')

@section('container')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('/help')}}">Helps</a></li>
      </ol>
      <h2>Single Help</h2>

    </div>
  </section><!-- End Breadcrumbs -->

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $help->judul }}</h1>

            In <a href="{{url('/categoryhelps') }}/{{$help->categoryHelp->slug}}" class="text-decoration-none">{{ $help->categoryHelp->name }}</a></p>

            @if ($help->helpImage)
            <div style="max-height: 350px; overflow:hidden">
              <img src="{{ asset('public/storage/' . $help->helpImage) }}" alt="{{ $help->categoryHelp->name }}" class="img-fluid pt-3">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $help->categoryHelp->name }}" alt="{{ $help->categoryHelp->name }}" class="img-fluid pt-3">
            @endif

            <article class="my-3 fs-5">
                {!! $help->body !!}
            </article>
            <a href="{{ url('/help') }}" class="d-block mt-3">Back To Helps</a>
        </div>
    </div>
</div>
    
@endsection