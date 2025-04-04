<!DOCTYPE html>
<html lang="vi">
<head>
    @include('clients.header')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-outline label {
            font-weight: 600;
        }
        .btn-custom {
            background: linear-gradient(135deg, #007bff, #6610f2);
            border: none;
            color: white;
        }
        .btn-custom:hover {
            opacity: 0.9;
        }
        .social-buttons .btn {
            border-radius: 50%;
            font-size: 20px;
            width: 45px;
            height: 45px;
            margin: 0 10px; /* Tăng khoảng cách giữa các nút */
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('clients.headernav')
    </div>
    <section>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="card-body">
                            <h2 class="text-center fw-bold text-primary">ĐĂNG KÝ TÀI KHOẢN</h2>
                            <p class="text-center text-muted">Tham gia cùng Samsung ngay hôm nay!</p>
                            <form method="POST" action="">
                                @csrf

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="email">Họ tên</label>
                                    <input type="text" id="name" name ="name" class="form-control" placeholder="Nhập tên của bạn" />
                                    @error('name')
                                        <div class="ms-5 text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name ="email" class="form-control" placeholder="Nhập email của bạn" />
                                    @error('email')
                                        <div class="ms-5 text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="password">Mật khẩu</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu" />
                                    @error('password')
                                        <div class="ms-5 text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="text-center mt-3">
                                    <p class="">Đã có tài khoản? <a href="{{ route('loginClients') }}" class="text-primary">Đăng nhập</a></p>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-custom btn-block">Đăng ký</button>
                                </div>
                            </form>
                            <div class="text-center mt-3">
                                <p>Hoặc đăng ký với</p>
                                <div class="social-buttons d-flex justify-content-center">
                                    <button class="btn btn-primary"><i class="fab fa-facebook-f"></i></button>
                                    <button class="btn btn-danger"><i class="fab fa-google"></i></button>
                                    <button class="btn btn-info"><i class="fab fa-twitter"></i></button>
                                    <button class="btn btn-dark"><i class="fab fa-github"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('clients.footer')
</body>
</html>
