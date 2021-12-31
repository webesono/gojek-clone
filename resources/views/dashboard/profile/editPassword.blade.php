@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Password</h1>
  </div>
<form action="{{route('profile.change.password')}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
    @csrf         
    <div class="row ">
        <div class="col-md-12">
            <div class="main-card mb-3  card">
                <div class="card-body">
                    <h4 class="card-title">
                        <h4>Change Password</h4>
                    </h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mt-3">
                                <label for="current_password">Old Password</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required
                                    placeholder="Masukkan password lama">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mt-3">
                                <label for="new_password ">New Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                                    placeholder="Masukkan password baru">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mt-3">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required 
                                    placeholder="Konfirmasi password baru">
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-first mt-4 ml-2">
                            <button type="submit" class="btn btn-primary"
                                id="formSubmit">Ubah Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</form>
@endsection