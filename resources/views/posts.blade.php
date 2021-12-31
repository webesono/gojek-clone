@extends('layouts.main')

@section('container')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{url('/blog')}}">Blog</a></li>
      </ol>
      <h2 class="mb-3">{{ $title }}</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          @if ($posts->count())
          @foreach ($posts as $post)
          <div class="position-absolute p-3 py-2 " style="background-color: rgba(0, 0, 0, 0.7);   border-radius: 250px 50px 50px 50px"><a href="{{url('/categories')}}/{{ $post->category->name }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
          <article class="entry"  style="border:1px solid #18d26e; border-radius: 50px">
            
              <div class="card" style="border:0px; margin-top: 10px"  href="{{url('/posts')}}/{{ $post->slug }}">
                
                
                @if ($post->postImage)
                <div style="max-height: 250px; overflow:hidden">
                    <img src="{{asset('public/storage/' . $post->postImage) }}" alt="{{ $post->category->name }}" class="img-fluid pt-3">
                </div>
                @else
                <div style=" max-height: 250px; overflow:hidden">
                  <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" style="border-radius: 50px 50px 5px 5px">
                </div>
                @endif
                
               
                <div class="card-body">
                  <h5 class="card-title"> <a href="{{url('/posts')}}/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{url('/author')}}/{{ $post->author->username }}">{{ $post->author->name }}</a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"> {{ $post->created_at->diffForHumans() }}</a></li>
                    </ul>
                  </div>

                  <p class="card-text "><a href="{{url('/posts')}}/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->excerpt }} </a></p>
                  <div class="read-more" style="
                    display: inline-block;
                    background: #fff;
                    color: #333333;
                    padding: 6px 30px 8px 30px;
                    transition: 0.3s;
                    font-size: 14px;
                    border-radius: 50px;
                    border: 2px solid #18d26e;" >
                    <a href="{{url('/posts')}}/{{ $post->slug }} ">Read More</a>
                  </div>
                </div>
              </div>
          </article>
          @endforeach<!-- End blog entry -->
          @else
            <p class="text-center fs-4">No post found</p>
          @endif
          


          {{-- <div class="d-flex justify-content-end">
  {{ $posts->links()}}
</div> --}}

          {{-- <div class="blog-pagination">
            <ul class="justify-content-center">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
            </ul>
          </div> --}}

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Search</h3>
            <div class="sidebar-item search-form">
              <form action="{{ route('search') }}"  method="GET">
                <input type="text" class="form-control" placeholder="Search Something?"name="search" value="{{request('search')}}" style="border-radius: 25px 0px 0px 25px" required/>
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            {{-- <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-item categories">
              <ul>
                @foreach ($posts as $post)
                <li><a href="#">{{ $post->category->name }} <span>({{ $posts->where('category_id', $post->category->id)->count() }})</span></a></li>
                @endforeach
              </ul>
            </div><!-- End sidebar categories--> --}}

            <h3 class="sidebar-title">Recent Posts</h3>
            @foreach ($posts->slice(0,5) as $post)
                <div class="sidebar-item recent-posts">
              <div class="post-item clearfix">
                @if ($post->postImage)
                  <img src="{{asset('public/storage/' . $post->postImage) }}" alt="">
                @else
                  <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                @endif
                <h4 class="card-title"> <a href="{{url('/posts')}}/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h4>
                <time>{{ $post->created_at->diffForHumans() }}</time>
              </div>
            @endforeach

            </div><!-- End sidebar recent posts-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
    
  </section><!-- End Blog Section -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</main><!-- End #main -->








@endsection
