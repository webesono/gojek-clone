@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $help->title }}</h1>

            In <a href="{{url('/categoryhelps') }}/{{$help->categoryHelp->slug}}" class="text-decoration-none">{{ $help->categoryHelp->name }}</a></p>

            <img src="https://source.unsplash.com/1200x400?{{ $help->categoryHelp->name }}" alt="{{ $help->categoryHelp->name }}" class="img-fluid">

            <article class="my-3 fs-5">
                {!! $help->body !!}
            </article>
            <a href="{{ url('/help') }}" class="d-block mt-3">Back To Helps</a>
        </div>
    </div>
</div>
    
@endsection