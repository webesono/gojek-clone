@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin">
            <h1 class="h3 mb-3 text-center" style="font-weight:1000; font-size: 30px">Login.</h1>

            {{-- notif berhasil tambah data --}}
            @if (session()->has('berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('berhasil')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{-- ................................... --}}

            {{-- notif gagal login --}}
            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{session('loginError')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{-- ................................... --}}
            
            <form action="{{url('/login')}}" method="POST">
              @csrf
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" value="{{old('username')}}" autofocus required>
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                <label for="password">Password</label>
              </div>
                            
              <button class="w-100 btn btn-lg btn-info text-white" style="font-weight:700" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3"><a href="{{url('/tambahadmin')}}">Register Now</a></small>
        </main>
    </div>
</div>


@endsection