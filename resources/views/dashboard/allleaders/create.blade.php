@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Leader Baru</h1>
  </div>

 <div class="col-lg-10" style="font-size: 18px">
  <form method="POST" action="{{ url('/dashboard/allleaders') }}"  class="mb-5" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
    @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
  </div>

  <div class="col-lg-10" style="font-size: 18px">
  <form method="POST" action="{{ url('/dashboard/allleaders') }}"  class="mb-5" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="position" class="form-label">Position</label>
    <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" required autofocus value="{{ old('position') }}">
    @error('position')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="formFile" class="form-label">Image</label>
    <img class="img-preview img-fluid mb-3 col-sm-5">
    <input class="form-control @error('leaderImage') is-invalid @enderror" type="file" id="leaderImage" name="leaderImage" onchange="previewImage()">
    @error('leaderImage')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    @error('body')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <input id="body" type="hidden" name="body">
    <trix-editor input="body"></trix-editor>
  </div>
 
  <button type="submit" class="btn btn-info text-white">Create Leader</button>
</form>
 </div>

<script>
  
    document.addEventListener("trix-file-accept", event => {
  event.preventDefault()
})
function previewImage(){
  const leaderImage= document.querySelector('#leaderImage');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(leaderImage.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
}



</script>
@endsection