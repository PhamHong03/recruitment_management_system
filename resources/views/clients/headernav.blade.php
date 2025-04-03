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
              <a class="nav-link" href="/">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about"> About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#jobposting">Bài đăng</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="why.html">Why Us</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="ourteam">Nhóm</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('loginClients') }}"> <i class="fa fa-user" aria-hidden="true"></i> Đăng nhập</a>
            </li> --}}
            <li class="nav-item dropdown">
              @if(Auth::check())
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="">Thông tin cá nhân</a>
                      <a class="dropdown-item" href="{{ route('logoutClients') }}">Đăng xuất</a>
                  </div>
              @else
                  <a class="nav-link" href="{{ route('loginClients') }}"> 
                      <i class="fa fa-user" aria-hidden="true"></i> Đăng nhập
                  </a>
              @endif
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
                        tuyển dụng sam sung's company
                      </h1>
                      <p>
                        Samsung, một công ty hàng đầu thế giới về công nghệ và đổi mới,
                        cung cấp các cơ hội nghề nghiệp thú vị cho những cá nhân tài năng trên toàn thế giới.
                        Trang web Samsung Careers của chúng tôi được thiết kế để kết nối những chuyên gia đầy tham vọng
                        với những vai trò phù hợp với kỹ năng và nguyện vọng của họ.Samsung, một công ty hàng đầu thế giới
                        về công nghệ và đổi mới, cung cấp các cơ hội nghề nghiệp thú vị
                        cho những cá nhân tài năng trên toàn thế giới. Trang web Samsung Careers của chúng tôi được thiết kế
                        để kết nối những chuyên gia đầy tham vọng với những vai trò phù hợp với kỹ năng
                        và nguyện vọng của họ.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn1">
                          Xem thêm
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
                        Samsung, một công ty hàng đầu thế giới về công nghệ và đổi mới,
                        cung cấp các cơ hội nghề nghiệp thú vị cho những cá nhân tài năng trên toàn thế giới.
                        Trang web Samsung Careers của chúng tôi được thiết kế để kết nối những chuyên gia đầy tham vọng
                        với những vai trò phù hợp với kỹ năng và nguyện vọng của họ.Samsung, một công ty hàng đầu thế giới
                        về công nghệ và đổi mới, cung cấp các cơ hội nghề nghiệp thú vị
                        cho những cá nhân tài năng trên toàn thế giới. Trang web Samsung Careers của chúng tôi được thiết kế
                        để kết nối những chuyên gia đầy tham vọng với những vai trò phù hợp với kỹ năng
                        và nguyện vọng của họ.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn1">
                          Xem thêm
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
                        Samsung, một công ty hàng đầu thế giới về công nghệ và đổi mới,
                        cung cấp các cơ hội nghề nghiệp thú vị cho những cá nhân tài năng trên toàn thế giới.
                        Trang web Samsung Careers của chúng tôi được thiết kế để kết nối những chuyên gia đầy tham vọng
                        với những vai trò phù hợp với kỹ năng và nguyện vọng của họ.Samsung, một công ty hàng đầu thế giới
                        về công nghệ và đổi mới, cung cấp các cơ hội nghề nghiệp thú vị
                        cho những cá nhân tài năng trên toàn thế giới. Trang web Samsung Careers của chúng tôi được thiết kế
                        để kết nối những chuyên gia đầy tham vọng với những vai trò phù hợp với kỹ năng
                        và nguyện vọng của họ.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn1">
                          Xem thêm
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