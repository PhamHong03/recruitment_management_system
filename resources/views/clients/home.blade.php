<!DOCTYPE html>
<html>

<head>
  @include('clients.header')

</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="/template/client/images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              SAM SUNG
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="why.html">Why Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="team.html">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
              </li>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Recruitment for SAMSUNG phones
                    </h1>
                    <p>
                      Samsung, a global leader in technology and innovation, 
                      offers exciting career opportunities for talented individuals worldwide. 
                      Our Samsung Careers website is designed to connect ambitious professionals 
                      with roles that align with their skills and aspirations.Samsung, a global 
                      leader in technology and innovation, offers exciting career opportunities 
                      for talented individuals worldwide. Our Samsung Careers website is designed 
                      to connect ambitious professionals with roles that align with their skills 
                      and aspirations.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="/template/client/images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Recruitment for SAMSUNG phones
                    </h1>
                    <p>
                      Samsung, a global leader in technology and innovation, 
                      offers exciting career opportunities for talented individuals worldwide. 
                      Our Samsung Careers website is designed to connect ambitious professionals 
                      with roles that align with their skills and aspirations.Samsung, a global 
                      leader in technology and innovation, offers exciting career opportunities 
                      for talented individuals worldwide. Our Samsung Careers website is designed 
                      to connect ambitious professionals with roles that align with their skills 
                      and aspirations.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="/template/client/images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Recruitment for SAMSUNG phones
                    </h1>
                    <p>
                      Samsung, a global leader in technology and innovation, 
                      offers exciting career opportunities for talented individuals worldwide. 
                      Our Samsung Careers website is designed to connect ambitious professionals 
                      with roles that align with their skills and aspirations.Samsung, a global 
                      leader in technology and innovation, offers exciting career opportunities 
                      for talented individuals worldwide. Our Samsung Careers website is designed 
                      to connect ambitious professionals with roles that align with their skills 
                      and aspirations.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="/template/client/images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>


  <!-- service section -->
  @include('clients.jobposting')

  <!-- end service section -->


  <!-- about section -->
  @include('clients.about')
  <!-- end about section -->

  <!-- why section -->

  @include('clients.apply')

  <!-- end why section -->

  <!-- team section -->
  @include('clients.ourteam')
  <!-- end team section -->


  <!-- client section -->
  @include('clients.joinus')

  <!-- end client section -->
@include('clients.footer')
</body>

</html>