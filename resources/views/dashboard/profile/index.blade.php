@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>
 <!-- Main content -->
<section class="content col-lg-9">
    <div class="card">
        <div class="card-header">
          @if ($user->id ==Auth::user()->id)
            <div class="card-tools" style="float: right; ">
              <a href="{{ url('/dashboard/profile')}}/{{ $user->id }}/edit" class="btn btn-sm btn-info float-right text-white" style="font-weight: 700; font-size:larger"><i class="fas fa-edit"></i> Edit Profil</a>
            </div>
          @endif
       
     </div>
  <!-- /.card-header -->
  <div class="card-body">
   @if (session()->has('success'))
    <div class="alert alert-success col-lg-7" role="alert">
      {{ session('success') }}
    </div>
  @endif
  
   <table class="table table-bordered ">
     <tbody> 
      <tr>
       <td colspan="2"><i class="fas 
         fa-user-circle"></i> 
        <strong>PROFIL<strong></td>
      </tr>     
      <tr>
       <td width="20%"><strong>Nama<strong></td>
       <td width="auto">{{ $user->name }}
                            </td>
      </tr>        
      <tr>
       <td width="20%"><strong>Email<strong></td>
       <td width="auto">{{ $user->email }}                    
                           </td>
      </tr> 
      <tr>
     <td width="20%"><strong>Role<strong></td>
        <td width="auto">
            @if ( $user->status == 1)
            Superadmin
            @else
            Admin
            @endif
        </td>
    </tr> 
     <tr>
      <td width="20%"><strong>Sejak<strong></td>
      <td width="auto">{{ $user->created_at->diffForHumans() }}</td>
     </tr> 
    <tr>
    <td width="20%"><strong>Deskripsi<strong></td>
      <td width="auto">{!! $user->body !!}</td>
    </tr> 
    <tr>
    <td width="20%"><strong>Foto<strong></td>
      <td width="auto"><div style="max-width:200px; max-height: 200px; overflow:hidden;">
        <img src="{{ asset('public/storage/' . $user->photo) }}" alt=""  class="card-img-top" alt="" >
      </div></td>
    </tr> 
    </tbody>
    </table> 
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">&nbsp;</div>
 </div>
 <!-- /.card -->

@endsection