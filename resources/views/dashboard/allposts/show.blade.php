@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <p>By {{ $post->author->name }} in {{ $post->category->name }}</a></p>
            
            <a href="" class="btn btn-warning mt-3  mx-3" style="float: right"><span data-feather="edit"></span> Edit</a>
            <a href="" class="btn btn-danger mt-3" style="float: right"><span data-feather="x-circle"></span> Delete</a>
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid pt-3">
            
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            <a href="{{ url('/dashboard/allposts') }}" class="btn btn-success mt-3"><span data-feather="arrow-left"></span> Back To All Posts</a>
        </div>
    </div>
</div>
@endsection
