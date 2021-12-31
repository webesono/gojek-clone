@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kategori</h1>
  </div>

  <div class="col-lg-10"  style="font-size: 12px">
    <form method="POST" action="{{ url('/dashboard/allcategories') }}/{{ $category->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $category->name) }}">
        @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required >
        @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
     
      <button type="submit" class="btn btn-info text-white">Ubah !</button>
    </form>
  </div>

  
  {{-- jQuery Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- Check Slug --}}
<script>
    $('#name').keyup(function(e) {
       $.get('{{ url('check_slug2') }}', 
       { 'name': $(this).val() }, 
       function( data ) {
           $('#slug').val(data.slug);
       }
       );
    });

    

</script>
  
@endsection