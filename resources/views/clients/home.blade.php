<!DOCTYPE html>
<html>

<head>
  @include('clients.header')

</head>

<body>

  <div class="hero_area">

    @include('clients.headernav')
    <!-- end header section -->

  </div>
<section class="service_section layout_padding" id ="jobposting">
  <div class="service_container">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>
          Bài đăng <span>Tuyển dụng</span>
        </h2>
        <p>
          Thông tin tuyển dụng mà chúng tôi muốn chia sẻ với bạn để giúp bạn khám phá các cơ hội nghề nghiệp mới cùng chúng tôi
        </p>
      </div>
      <div id="loadProduct">
        @include('clients.jobposting', ['job_postings' => $job_postings])
      </div>
      <div class="btn-box" id="btn-loadMore">
          <input type="hidden" value="1" id="page">
          <a class="btn btn-loadMore" onclick="loadMore()">
              Xem tất cả
          </a>
      </div>
    </div>
  </div>
</section>


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