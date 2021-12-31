@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row  my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $help->judul }}</h1>

            Category : {{ $help->categoryHelp->name }}</a></p>
            <a href="{{ url('/dashboard/allhelps')}}/{{ $help->id }}/edit" class="btn btn-warning mt-3 mx-3 text-white"><span data-feather="edit"></span> Edit</a>
            <form class="d-inline" action="{{ url('/dashboard/allhelps')}}/{{ $help->id }}" method="POST" col-lg-11>
                @method('delete')
                @csrf
                <button class="btn btn-danger mt-3" onclick="return confirm('Yakin nih mau hapus data?')"><span data-feather="x-circle"></span>Delete</button>
              </form>
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
            <a href="{{ url('/dashboard/allhelps') }}" class="btn btn-success mt-3"><span data-feather="arrow-left"></span> Back To All Helps</a>
        </div>
    </div>
</div>
@endsection
