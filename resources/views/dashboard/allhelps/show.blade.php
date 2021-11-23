@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row  my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $help->title }}</h1>

            Category : {{ $help->categoryHelp->name }}</a></p>
            <a href="{{ url('/dashboard/allhelps')}}/{{ $help->id }}/edit" class="btn btn-warning mt-3 mx-3 text-white" style="float: right"><span data-feather="edit"></span> Edit</a>
            <form class="d-inline" action="{{ url('/dashboard/allposts')}}/{{ $help->id }}" method="POST" col-lg-11>
                @method('delete')
                @csrf
                <button class="btn btn-danger mt-3" style="float: right" onclick="return confirm('Yakin nih mau hapus data?')"><span data-feather="x-circle"></span>Delete</button>
              </form>
            <img src="https://source.unsplash.com/1200x400?{{ $help->categoryHelp->name }}" alt="{{ $help->categoryHelp->name }}" class="img-fluid pt-3">
            
            <article class="my-3 fs-5">
                {!! $help->body !!}
            </article>
            <a href="{{ url('/dashboard/allhelps') }}" class="btn btn-success mt-3"><span data-feather="arrow-left"></span> Back To All Helps</a>
        </div>
    </div>
</div>
@endsection
