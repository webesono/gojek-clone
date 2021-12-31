@extends('layouts.main')

  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox" style="font-size: 20px">

          <div class="carousel-item active" style="background-image: url({{ asset('public/assets/img/hero-carousel/1.png') }})">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Siang, Malam?  Apa itu?</h2>
                <p class="animate__animated animate__fadeInUp"> Kami siap melayani kapanpun tanpa mengenal waktu</p>
                <a  href="{{url('/#about')}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">About Us</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url({{ asset('public/assets/img/hero-carousel/4.png') }})">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Bagai lirik lagunya Anji</h2>
                <p class="animate__animated animate__fadeInUp">Kami akan selalu "Menunggumu, datang, menjemputmu pulang"</p>
                <a  href="{{url('/#about')}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">About Us</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url({{ asset('public/assets/img/hero-carousel/2.png') }})">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">At vero eos et accusamus</h2>
                <p class="animate__animated animate__fadeInUp">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
                <a  href="{{url('/#about')}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">About Us</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url({{ asset('public/assets/img/hero-carousel/2.jpg') }})">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Temporibus autem quibusdam</h2>
                <p class="animate__animated animate__fadeInUp">Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.</p>
                <a  href="{{url('/#about')}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">About Us</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url({{ asset('public/assets/img/hero-carousel/3.png') }})">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Nam libero tempore</h2>
                <p class="animate__animated animate__fadeInUp">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum.</p>
                <a  href="{{url('/#about')}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">About Us</a>
              </div>
            </div>
          </div>

          
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Featured Services Section Section ======= -->
    <!-- End Featured Services Section -->
@section('container')


    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>About Us</h3>
          <p>Glone, perusahaan jasa trasportasi yang akan melayani anda kapanpun dan dimanapun.</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-bar-chart"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Mission</a></h2>
              <p>
                Memberikan pelayanan terbaik bagi konsumen kami dan menjadi penyedia lowongan pekerjaan dengan fasilitas terbaik.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Plan</a></h2>
              <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Vision</a></h2>
              <p>
                Menjadi perusahaan penyedia jasa transportasi yang dapat memberikan pelayanan di berbagai daerah, bahkan di seluruh dunia.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    {{-- <section id="services">
      <div class="container" data-aos="fade-up">

        <header class="section-header wow fadeInUp">
          <h3>Services</h3>
          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos paradigno tridexa panatarel.</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-card-checklist"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-bar-chart"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-binoculars"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-brightness-high"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>

        </div>

      </div>
    </section><!-- End Services Section --> --}}

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="title" ><a style="color: black" href="{{url('/products')}}">Our Product</a></h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class=" col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active" style="display: none">All</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @foreach ($products->slice(0,6) as $product)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="{{asset('public/storage/' . $product->productImage) }}" class="img-fluid" alt="">
              <a href="{{asset('public/storage/' . $product->productImage) }}" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery"><i class="bi bi-plus"></i></a>
              <a href="{{url('/product')}}/{{ $product->id }}" class="link-details" title="More Details"><i class="bi bi-link"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="{{url('/product')}}/{{ $product->id }}">{{$product->name}}</a></h4>
              <p style="font-size: 9px">{{$product->excerpt}}</p>
            </div>
          </div>
        </div>
        @endforeach        

      </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients">
      <div class="container" data-aos="zoom-in">

        <header class="section-header">
          <h3>Our Leaders</h3>
        </header>

        <div class="clients-slider swiper" >
          <div class="swiper-wrapper align-items-center" style="max-height: 200px">
            @foreach ($leaders as $leader)
            <div class="swiper-slide">
              @if ($leader->leaderImage)
                  <img class="row justify-content-center" style="text-align:center; width: 120px; height:120px; border-radius: 50%; border: 4px solid #fff; margin: 0 auto;" src="{{asset('public/storage/' . $leader->leaderImage) }}" class="img-fluid" alt="">
                @else
                <img class="row justify-content-center" style="width: 120px; height:120px; border-radius: 50%;border: 4px solid #fff; margin: 0 auto;" src="https://img.icons8.com/external-wanicon-two-tone-wanicon/50/000000/external-avatar-professions-avatar-wanicon-two-tone-wanicon-6.png" class="img-fluid" alt="">
                @endif

              <p style="text-align: center; font-weight: 700; margin-bottom:1px">{{ $leader->name }}</p>
              <p style="text-align: center" > {{ $leader->position }}</p>
            </div>
            
            @endforeach
            <div class="swiper-slide"><a href="https://icons8.com/icon/yQ1OtPrMdEis/avatar">Avatar icon by Icons8</a><img src="" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Our Clients Section -->

    <!-- ======= Testimonials Section ======= -->
    {{-- <section id="testimonials" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>
        @foreach ($leaders as $leader)
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{asset('public/storage/' . $leader->leaderImage) }}" class="testimonial-img" alt="">
                <h3>{{ $leader->name }}</h3>
                <h4>{{ $leader->position }}</h4>
                <p>
                  <img src="{{ asset('public/assets/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
                  {!! $leader->body !!}
                  <img src="{{ asset('public/assets/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
                </p>
              </div>
            </div><!-- End testimonial item -->
        @endforeach
        

             <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ asset('public/assets/img/testimonial-2.jpg') }}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <img src="{{ asset('public/assets/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <img src="{{ asset('public/assets/img/quote-sign-left.png') }}" class="quote-sign-right" alt="">
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ asset('public/assets/img/testimonial-3.jpg') }}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <img src="{{ asset('public/assets/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <img src="{{ asset('public/assets/img/quote-sign-left.png') }}" class="quote-sign-right" alt="">
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonial-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <img src="{{ asset('public/assets/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <img src="{{ asset('public/assets/img/quote-sign-left.png') }}" class="quote-sign-right" alt="">
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section --> --}}

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3>Team</h3>
          <p><b> Kelompok 2</b>, berikut adalah daftar anggota kelompok 2</p>
        </div>

        <div class="row">
          @foreach ($users->slice(0,6) as $user)
          <div class="col-lg-2 col-md-6">
            <div class="member bg-white" style="min-height:60%" data-aos="fade-up" data-aos-delay="100">
              @if ($user->photo)
                <img style="border-radius: 25px" src="{{asset('public/storage/' . $user->photo) }}" class="img-fluid" alt="">
              @else
              <img style="border-radius: 25px; margin-top: 22%" src="https://img.icons8.com/external-wanicon-two-tone-wanicon/50/000000/external-avatar-professions-avatar-wanicon-two-tone-wanicon-6.png" class="img-fluid" alt="">
                @endif
              <div style="border-radius: 25px" class="member-info">
                <div class="member-info-content">
                  <h4>{{ $user->name }}</h4>
                  <span></span>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>Ada masalah? Butuh Bantuan? <br><a  href="{{url('/help')}}">Cari di halaman Helps</a> atau dapat menghubungi kami.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, NY 535022, USA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>

        </div>

        {{-- <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div> --}}

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @include('partials.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->
@endsection
        
    