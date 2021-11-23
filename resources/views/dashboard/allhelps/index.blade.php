@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Helps</h1>
  </div>
  <a href="{{ url('/dashboard/allhelps/create') }}" class="btn btn-info mb-3 text-white" style="font-weight: 500" >Tambah Bantuan</a>
  <form class="col-lg-7" action="{{ route('dasearchHelp') }}"  method="GET">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="What can we help you?"name="dasearchHelp" value="{{request('dasearchHelp')}}" style="border-radius: 25px 0px 0px 25px;" required/>
      <button class="btn btn-info text-white" style="border-radius: 0px 25px 25px 0px" type="submit">Cari</button>
    </div>
  </form>
  @if (session()->has('success'))
    <div class="alert alert-success col-lg-7" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive col-lg-7 " style="font-size: 12px">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
        </thead>
        </tbody>
        @foreach ($helps as $help)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $help->title }}</td>
            <td>{{ $help->categoryHelp->name }}</td>
            <td>
                <a href="{{ url('/dashboard/allhelps')}}/{{ $help->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="{{ url('/dashboard/allhelps')}}/{{ $help->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form class="d-inline" action="{{ url('/dashboard/allposts')}}/{{ $help->id }}" method="POST" col-lg-11>
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

  {{ $helps->links() }}
@endsection
