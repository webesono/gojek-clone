@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Bikin Bantuan Baru</h1>
  </div>

 <div class="col-lg-10" style="font-size: 18px">
  <form method="POST" action="{{ url('/dashboard/allhelps') }}">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
    @error('title')
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
  <div class="mb-3">
    <label for="categoryHelp" class="form-label">Category</label>
    <select class="form-select" name="categoryHelp_id">

      @foreach ($categoryHelps as $categoryHelp)
      @if (old('categoryHelp_id') == $categoryHelp->id)
        <option value="{{ $categoryHelp->id }}" selected>{{ $categoryHelp->name }}</option>
      @else
        <option value="{{ $categoryHelp->id }}">{{ $categoryHelp->name }}</option>
      @endif
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    @error('body')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <input id="body" type="hidden" name="body">
    <trix-editor input="body"></trix-editor>
  </div>
 
  <button type="submit" class="btn btn-info text-white">Create Help</button>
</form>
 </div>

  {{-- jQuery Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- Check Slug --}}

<script>
  $('#title').keyup(function(e) {
       $.get('{{ url('check_slug') }}', 
       { 'title': $(this).val() }, 
       function( data ) {
           $('#slug').val(data.slug);
       }
       );
    });

    document.addEventListener("trix-file-accept", event => {
  event.preventDefault()
})
</script>
@endsection