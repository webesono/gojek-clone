@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Admin Baru</h1>
  </div>

  <div class="col-lg-10">
    <form method="POST" action="{{ url('/dashboard/allusers') }}" class="mb-5" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required  value="{{ old('username') }}">
        @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required >
        @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" name="status">
                <option value= 0 >Admin</option>
                <option value= 1 >Superadmin</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">Photo</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" onchange="previewImage()">
        @error('photo')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="body" class="form-label">Deskripsi Singkat</label>
        @error('body')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body">
        <trix-editor input="body"></trix-editor>
      </div>
     
      <button type="submit" class="btn btn-info text-white">Tambahkan</button>
    </form>
  </div>

  
  {{-- jQuery Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- Check Slug --}}
<script>
    
    document.addEventListener("trix-file-accept", event => {
        event.preventDefault()
    })
    function previewImage(){
    const photo= document.querySelector('#photo');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(photo.files[0]);

    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
    }
</script>
  
@endsection