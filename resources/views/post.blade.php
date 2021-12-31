@extends('layouts.main')

@section('container')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="{{url('/blog')}}">Blog</a></li>
        </ol>
        <h2>Single Post</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                @if ($post->postImage)
                    <img src="{{asset('public/storage/' . $post->postImage) }}" alt="{{ $post->category->name }}" class="img-fluid pt-3">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                @endif
              </div>

              <h2 class="entry-title">
                <a href="#">{{ $post->title }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{url('/author')}}/{{ $post->author->username }}">{{ $post->author->name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"> {{ $post->created_at->diffForHumans() }}</a></li>
                </ul>
              </div>

              <div class="entry-content">
                {!! $post->body !!}
              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="{{url('/categories')}}/{{ $post->category->name }}">{{ $post->category->name }}</a></li>
                </ul>
              </div>

            </article><!-- End blog entry -->

            <div class="blog-author d-flex align-items-center">
              <img src="{{asset('public/storage/' . $post->author->photo) }}" class="rounded-circle float-left" alt="">
              <div>
                <h4>{{ $post->author->name }}</h4>
                <div class="social-links">
                  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div>
                {!! $post->author->body !!}
              </div>
            </div><!-- End blog author bio -->
    
@endsection
