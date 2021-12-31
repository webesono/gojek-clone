@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Products</h1>
  </div>
  <a href="{{ url('/dashboard/allproducts/create') }}" class="btn btn-info mb-3 text-white" style="font-weight: 500" >Tambah Produk</a>
  <form class="col-lg-5" action="{{ route('dasearchProduct') }}"  method="GET">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search Something?"name="dasearchProduct" value="{{request('dasearchProduct')}}" style="border-radius: 25px 0px 0px 25px;" required/>
      <button class="btn btn-info text-white" style="border-radius: 0px 25px 25px 0px" type="submit">Cari</button>
    </div>
  </form>
  @if (session()->has('success'))
    <div class="alert alert-success col-lg-5" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive col-lg-5 " style="font-size: 12px">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
        </thead>
        </tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>
                <a href="{{ url('/dashboard/allproducts')}}/{{ $product->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="{{ url('/dashboard/allproducts')}}/{{ $product->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form class="d-inline" action="{{ url('/dashboard/allproducts')}}/{{ $product->id }}" method="POST" col-lg-11>
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin nih mau hapus data?')"><span data-feather="x-circle"></span></button>
                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
        </table>
    </div>

  {{ $products->links() }}
@endsection
