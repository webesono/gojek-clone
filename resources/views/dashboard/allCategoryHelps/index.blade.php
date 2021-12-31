@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Help Categories</h1>
  </div>
  <a  class="btn btn-info mb-3 text-white" style="font-weight: 500" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Tambah Kategori</a>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form  method="POST" action="{{ url('/dashboard/allcategoryHelps') }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama Kategori</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
              @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" readonly required >
              @error('slug')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary mt-4">Bikin !</button>
          </form>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>




  {{-- <form class="col-lg-11" action="{{ route('dasearchCat') }}"  method="GET">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search Something?"name="dasearchCat" value="{{request('dasearchCat')}}" style="border-radius: 25px 0px 0px 25px" required/>
      <button class="btn btn-info text-white" type="submit" style="border-radius: 0px 25px 25px 0px">Cari</button>
    </div>
  </form>   --}}
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-5" role="alert">
          {{ session('success') }}
        </div>
    @elseif (session()->has('danger'))
        <div class="alert alert-danger col-lg-5" role="alert">
          {{ session('danger') }}
        </div>
    @endif

    <div class="table-responsive col-lg-5" style="font-size: 15px">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        </tbody>
        @foreach ($categoryHelps as $categoryHelp)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $categoryHelp->name }}</td>
            <td>

                <a href="{{ url('/dashboard/allcategoryHelps')}}/{{ $categoryHelp->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form  class="d-inline" action="{{ url('/dashboard/allcategoryHelps')}}/{{ $categoryHelp->id }}" method="POST" col-lg-11>
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

  {{ $categoryHelps->links() }}

  {{-- jQuery Script --}}
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 {{-- Check Slug --}}
 <script>
     $('#name').keyup(function(e) {
        $.get('{{ url('check_slug4') }}', 
        { 'name': $(this).val() }, 
        function( data ) {
            $('#slug').val(data.slug);
        }
        );
     });
</script>

<script>
  
  var exampleModal = document.getElementById('exampleModal')
  exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')

})
</script>
@endsection
