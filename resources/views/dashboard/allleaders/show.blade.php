@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row  my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $leader->name }}</h1>

            <a href="{{ url('/dashboard/allleaders')}}/{{ $leader->id }}/edit" class="btn btn-warning mt-3 mx-3 text-white"><span data-feather="edit"></span> Edit</a>
            <form class="d-inline" action="{{ url('/dashboard/allleaders')}}/{{ $leader->id }}" method="POST" col-lg-11>
                @method('delete')
                @csrf
                <button class="btn btn-danger mt-3" onclick="return confirm('Yakin nih mau hapus leader?')"><span data-feather="x-circle"></span>Delete</button>
              </form>
              @if ($leader->leaderImage)
              <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('public/storage/' . $leader->leaderImage) }}" class="img-fluid pt-3">
              </div>
              @else
              <img src="https://source.unsplash.com/1200x400?{{ $leader->name }}" alt="{{ $leader->name }}" class="img-fluid pt-3">
              @endif
            
            
            <article class="my-3 fs-5">
                {!! $leader->body !!}
            </article>
            <a href="{{ url('/dashboard/allleaders') }}" class="btn btn-success mt-3"><span data-feather="arrow-left"></span> Back To All Leaders</a>
        </div>
    </div>
</div>
@endsection
