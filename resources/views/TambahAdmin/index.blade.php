@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">
        
        <main class="form-tambahData">
            <h1 class="h3 mb-3 text-center" style="font-weight:1000; font-size: 30px">Register.</h1>
            <form action="{{url('/tambahadmin')}}" method="post">
              @csrf
                <div class="form-floating">
                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" value="{{old('name')}}"placeholder="Name">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback"></div>
                      {{$message}}
                    @enderror
                  </div>  
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" value="{{old('username')}}" placeholder="username">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback"></div>
                  {{$message}}
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" value="{{old('email')}}" placeholder="name@example.com">
                <label for="email">Email Address</label>
                @error('email')
                <div class="invalid-feedback"></div>
                  {{$message}}
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password')is-invalid @enderror"  id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback"></div>
                  {{$message}}
                @enderror
              </div>
          
              
              <button class="w-100 btn btn-lg btn-info text-white mt-3" style="font-weight:700" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Back To<a href="{{url('/login')}}"> Login</a></small>
        </main>
    </div>
</div>


@endsection