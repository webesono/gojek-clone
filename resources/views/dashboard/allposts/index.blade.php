@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Posts</h1>
  </div>
  <a href="{{ url('/dashboard/allposts/create') }}" class="btn btn-info mb-3 text-white" style="font-weight: 500" >Tambah Postingan</a>
    
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-11" role="alert">
          {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-11" style="font-size: 20px">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Author</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        </tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>{{ $post->author->name }}</td>
            <td>
                <a href="{{ url('/dashboard/allposts')}}/{{ $post->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <form action="{{ url('/dashboard/allposts')}}/{{ $post->id }}" method="POST" col-lg-11>
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin nih mau hapus data?')"><span data-feather="x-circle"></span></button>
                </form>
                <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
               
            </td>
        </tr>
        @endforeach

        </tbody>
        </table>
    </div>
  

  {{ $posts->links() }}
@endsection