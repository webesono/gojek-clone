@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row  my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $product->name }}</h1>

            <a href="{{ url('/dashboard/allproducts')}}/{{ $product->id }}/edit" class="btn btn-warning mt-3 mx-3 text-white"><span data-feather="edit"></span> Edit</a>
            <form class="d-inline" action="{{ url('/dashboard/allproducts')}}/{{ $product->id }}" method="POST" col-lg-11>
                @method('delete')
                @csrf
                <button class="btn btn-danger mt-3" onclick="return confirm('Yakin nih mau hapus produk?')"><span data-feather="x-circle"></span>Delete</button>
              </form>
              @if ($product->productImage)
              <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('public/storage/' . $product->productImage) }}" class="img-fluid pt-3">
              </div>
              @else
              <img src="https://source.unsplash.com/1200x400?{{ $product->name }}" alt="{{ $product->name }}" class="img-fluid pt-3">
              @endif
            
            
            <article class="my-3 fs-5">
                {!! $product->body !!}
            </article>
            <a href="{{ url('/dashboard/allproducts') }}" class="btn btn-success mt-3"><span data-feather="arrow-left"></span> Back To All Products</a>
        </div>
    </div>
</div>
@endsection
