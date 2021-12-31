@extends('layouts.main')

@section('container')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{url('/products')}}">Product</a></li>
    </ol>
    <h2 class="mb-3">{{ $title }}</h2>

  </div>
</section><!-- End Breadcrumbs -->
<h1 class="mb-5 text-center" style="font-weight:1000;">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-7">
    <form action="{{ route('searchProduct') }}"  method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Mencari sesuatu pada produk kami?"name="searchProduct" value="{{request('searchProduct')}}" style="border-radius: 25px 0px 0px 25px; height: 50px; font-size:20px" required/>
        <button class="btn btn-success text-white" style="font-weight:1000;font-size:20px; border-radius: 0px 25px 25px 0px" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

@if ($products->count())
{{-- <div class="card mb-3" style="border:1px solid #18d26e; border-radius: 50px">
    
  @if ($products[0]->productImage)
  <div style=" max-height: 350px; overflow:hidden">
    <img style="width:auto; border-radius: 50px 50px 0px 0px" src="{{ asset('public/storage/' . $products[0]->productImage) }}" alt="{{ $products[0]->name }}" class="img-fluid">
  </div>
  @else
  <img src="https://source.unsplash.com/1200x400?{{ $products[0]->name }}" class="card-img-top" alt="{{ $products[0]->name }}" style="border-radius: 50px">
  @endif
  
  
  <div class="card-body text-center" >
    <h3 class="card-title"><a href="{{url('/product')}}/{{ $products[0]->id }}" class="text-decoration-none text-dark">{{ $products[0]->judul }}</a></h3>
    <p class="card-text">{{ $products[0]->excerpt }}</p>

    <a href="{{url('/product')}}/{{ $products[0]->id }}" class="text-decoration-none btn btn-primary">Read more..</a>
    
  </div>
</div> --}}
  

  <div class="container">
    <div class="row">
      @foreach ($products as $product)
        <div class="col-md-6 mb-4" >
          <div class="card"  style="border:1px solid #18d26e; border-radius: 50px" href="{{url('/products')}}">
            @if ($product->productImage)
            <div style="max-height: 350px; overflow:hidden">
              <img src="{{ asset('public/storage/' . $product->productImage) }}" alt="{{ $product->name }}"  class="card-img-top" alt="{{ $product->name }}" style="border-radius: 50px 50px 5px 5px">
            </div>
          @else
          <img src="https://source.unsplash.com/500x400?{{ $product->name }}" class="card-img-top" alt="{{ $product->name }}" style="border-radius: 50px 50px 5px 5px">
          @endif
            <div class="card-body">

              <h5 class="card-title"> <a href="{{url('/product')}}/{{ $product->id }}" class="text-decoration-none text-dark">{{ $product->name }}</a></h5>
              <p>
                <small class="text-muted">
                    Created at </a> {{ $product->created_at->diffForHumans() }}
                </small>
              </p>
              <p class="card-text "><a href="{{url('/product')}}/{{ $product->id }}" class="text-decoration-none text-dark">{{ $product->excerpt }} </a><a href="{{url('/product')}}/{{ $product->id }} " class="text-decoration-none">Read more ...</a></p>
              
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  @else
      <p class="text-center fs-4">Sorry, no product found.</p>
  @endif
{{-- <div class="d-flex justify-content-end">
  {{ $products->links()}}
</div> --}}
@endsection