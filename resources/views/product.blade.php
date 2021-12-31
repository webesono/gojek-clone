@extends('layouts.main')

@section('container')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('/products')}}">Products</a></li>
      </ol>
      <h2>Single Product</h2>

    </div>
  </section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $product->name }}</h1>

            @if ($product->productImage)
            <div style="max-height: 350px; overflow:hidden">
              <img src="{{ asset('public/storage/' . $product->productImage) }}" alt="{{ $product->name }}" class="img-fluid pt-3">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $product->name }}" alt="{{ $product->name }}" class="img-fluid pt-3">
            @endif

            <article class="my-3 fs-5">
                {!! $product->body !!}
            </article>
            <a href="{{ url('/products') }}" class="d-block mt-3">Back To Products</a>
        </div>
    </div>
</div>
    
@endsection