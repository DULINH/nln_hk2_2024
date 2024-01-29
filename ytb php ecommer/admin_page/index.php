<?php
require "../database/connection.php"
?>

<!doctype html>
<html lang="en">

<head>
  <title>ADMIN PAGE</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <!-- fontawesome script   -->
  <script src="https://kit.fontawesome.com/a69e533ba1.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./index.css">


  <style>
    .admin_img {
      width: 100px;
      object-fit: contain;
      margin-left: 3px;
    }

    
  </style>
</head>

<body class="container">
  <header class="container mb-3">
    <!-- place navbar here -->
    <div class="container-fluid text-center text-dark"
      style="background-color: #e3f2fd; height: 90px; padding-top: 20px;">
      <h2>Trang quản lý dành cho Admin HJ ENGLISH</h2>
    </div>
  </header class="container">

  <main class="container">

    <!-- main index  -->
    <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
          role="tab" aria-controls="home" aria-selected="true">Home</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
          role="tab" aria-controls="profile" aria-selected="false">
          Profile
        </button>
      </li>
    </ul>

    <!-- main content  -->
    <div class="tab-content mb-5 container-fluid" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row container-fluid">

          <!-- main navbar  -->
          <nav class="navbar navbar-expand-lg navbar-light mb-5 container" style="background-color: #e3f2fd;">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                Hello <p>Linh</p>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Quản lý người dùng
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Thông tin người dùng
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li>
                            <a class="dropdown-item" href="index.php?users">
                              Người dùng thường
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="index.php?vipusers">
                              VIP Users
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="dropdown-item" href="index.php?role">Phân quyền người dùng</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Quản lý khóa học
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Tiếng Anh
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course">Giáo trình</a></li>
                          <li><a class="dropdown-item" href="index.php?vocab_eng">Từ vựng</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Tiếng Hàn
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Giáo trình</a></li>
                          <li><a class="dropdown-item" href="index.php?vocab_korean">Từ vựng</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Tiếng Trung
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Giáo trình</a></li>
                          <li><a class="dropdown-item" href="index.php?vocab_chinese">Từ vựng</a></li>
                        </ul>
                      </li>
                      <li><a class="dropdown-item" href="index.php?exampleE">Bài mẫu</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Quản lý video
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Tiếng Anh</a></li>
                    <li><a class="dropdown-item" href="#">Tiếng Hàn</a></li>
                    <li><a class="dropdown-item" href="#">Tiếng Trung</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Quản lý cửa hàng
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Giáo Trình
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?cuahang">Tiếng Anh</a></li>
                          <li><a class="dropdown-item" href="#">Tiếng Hàn</a></li>
                          <li><a class="dropdown-item" href="#">Tiếng Trung</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Sách tham khảo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Tiếng Anh</a></li>
                          <li><a class="dropdown-item" href="#">Tiếng Hàn</a></li>
                          <li><a class="dropdown-item" href="#">Tiếng Trung</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Sách tập viết
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Tiếng Trung</a></li>
                          <li><a class="dropdown-item" href="#">Tiếng Hàn</a></li>
                        </ul>
                      </li>
                      <li><a class="dropdown-item" href="#">Note book</a></li>
                      <li><a class="dropdown-item" href="#">Đồ dùng học tập</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Quản lý đơn hàng
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Đơn hàng
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Đơn đặt hàng</a></li>
                          <li><a class="dropdown-item" href="#">Đang giao</a></li>
                          <li><a class="dropdown-item" href="#">Đã hoàn thành</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Yêu cầu hủy đơn hàng
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Trắc Nghiệm</a></li>
                          <li><a class="dropdown-item" href="#">Thẻ từ vựng</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Đơn hàng bị hủy
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Từ người mua</a></li>
                          <li><a class="dropdown-item" href="#">Từ người bán</a></li>
                        </ul>
                      </li>
                      <li><a class="dropdown-item" href="index.php?bill">Bill</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Quản lý test
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Tiếng Anh
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Trắc Nghiệm</a></li>
                          <li><a class="dropdown-item" href="#">Thẻ từ vựng</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Tiếng Hàn
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Trắc Nghiệm</a></li>
                          <li><a class="dropdown-item" href="#">Thẻ từ vựng</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Tiếng Trung
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Trắc Nghiệm</a></li>
                          <li><a class="dropdown-item" href="#">Thẻ từ vựng</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Quản lý bài đăng
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Người dùng
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">POST</a></li>
                          <li><a class="dropdown-item" href="#">Câu hỏi</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">KPI-PR</a></li>
                          <li><a class="dropdown-item" href="#">Diễn Đàn</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>


      </div>

      <!-- Profile section  -->
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container">
          <div class="main-body">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Admin"
                        class="rounded-circle p-1 bg-primary" width="110">
                      <div class="mt-3">
                        <h4>DLINH</h4>
                        <p class="text-secondary mb-1">Full Stack Developer</p>
                        <p class="text-muted font-size-sm">TP Cao Lãnh, Đồng Tháp</p>
                        <button class="btn btn-primary">Follow</button>
                        <button class="btn btn-outline-primary">Message</button>
                      </div>
                    </div>
                    <hr class="my-4">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-globe me-2 icon-inline">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path
                              d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                            </path>
                          </svg>Website</h6>
                        <span class="text-secondary">https://DLINH-2024.com</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-github me-2 icon-inline">
                            <path
                              d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                            </path>
                          </svg>Github</h6>
                        <span class="text-secondary">DLINH2023</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-twitter me-2 icon-inline text-info">
                            <path
                              d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                            </path>
                          </svg>Twitter</h6>
                        <span class="text-secondary">@dlinh190802</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-instagram me-2 icon-inline text-danger">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                          </svg>Instagram</h6>
                        <span class="text-secondary">lovelives</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-facebook me-2 icon-inline text-primary">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                          </svg>Facebook</h6>
                        <span class="text-secondary">Linh Bui</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" value="Bùi Trần Duy Linh">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" value="linhb2014846@student.ctu.edu.vn">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" value="0939 085 ***">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <h6 class="mb-0">School</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" value="Can Tho University">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" value="Ấp 16, Xã Mỹ Thới, TP Cao Lãnh, tỉnh Đồng Tháp">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-9 text-secondary">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                          data-bs-target="#exampleModal">
                          Edit
                        </button>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin Admin</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <!-- Thông tin cần được cập nhật  -->
                              <div class="card">
                                <div class="card-body">
                                  <div class="row mb-3">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                      <input type="text" class="form-control" value="Bùi Trần Duy Linh">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                      <input type="text" class="form-control" value="linhb2014846@student.ctu.edu.vn">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                      <input type="text" class="form-control" value="0939 085 ***">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">School</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                      <input type="text" class="form-control" value="Can Tho University">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                      <input type="text" class="form-control"
                                        value="Ấp 16, Xã Mỹ Thới, TP Cao Lãnh, tỉnh Đồng Tháp">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- end thông tin cần được cập nhật -->
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close_admin_edit" name="close_admin_edit">Close</button>
                              <button type="button" class="btn btn-primary" id="save_admin_edit" name="save_admin_edit">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                        <p>Web Design</p>
                        <div class="progress mb-3" style="height: 5px">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p>Website Markup</p>
                        <div class="progress mb-3" style="height: 5px">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p>One Page</p>
                        <div class="progress mb-3" style="height: 5px">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p>Mobile Template</p>
                        <div class="progress mb-3" style="height: 5px">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p>Backend API</p>
                        <div class="progress" style="height: 5px">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Chèn trang khác  -->

    
    <div class="container" id="admin_profile">
      <?php 
          if(isset($_GET['insert_flashcard'])) {
            include('insert_flashcard.php');
          }
          if(isset($_GET['insert_giaotrinh'])) {
            include('insert_giaotrinh.php');
          }
          if(isset($_GET['users'])) {
            include('users.php');
          }
          if(isset($_GET['vipusers'])) {
            include('vipusers.php');
          }
          if(isset($_GET['bill'])) {
            include('bill.php');
          }
          if(isset($_GET['role'])) {
            include('roles.php');
          }
          if(isset($_GET['vocab_eng'])) {
            include('vocab_eng.php');
          }
          if(isset($_GET['vocab_korean'])) {
            include('vocab_korean.php');
          }
          if(isset($_GET['vocab_chinese'])) {
            include('vocab_chinese.php');
          }
          if(isset($_GET['exampleE'])) {
            include('exampleWritting.php');
          }
          if(isset($_GET['cuahang'])) {
            include('cuahang.php');
          }
          if(isset($_GET['insertVocabEng'])) {
            include('insert_vocab_eng.php');
          }
          if(isset($_GET['insertVocabChinese'])) {
            include('insert_vocab_chinese.php');
          }
          if(isset($_GET['insertVocabKorean'])) {
            include('insert_vocab_korean.php');
          }
          if(isset($_GET['course'])) {
            include('course.php');
          }

        ?>
    </div>
  </main>

  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

  <script>
    //Chuyển đổi giữa admin, profile
    document.addEventListener('DOMContentLoaded', function () {
      const removeContentBtn = document.getElementById('profile-tab');
      const insertCategoriesContainer = document.getElementById('admin_profile');

      removeContentBtn.addEventListener('click', function () {
        insertCategoriesContainer.innerHTML = '';
      });
    });

    //Hiển thị thông báo khi thao tác CRUD
    document.addEventListener("DOMContentLoaded", function() {
      const successMessage = document.querySelector("#successMessage");
      successMessage.style.display = "block"; // Hiển thị thông báo

      setTimeout(function() {
        successMessage.style.display = "none"; // Ẩn thông báo sau 1 giây
      }, 1000); // Thời gian đợi là 1000ms = 1 giây
    });

    // function redirect(select) {
    //     const selectedValue = select.options[select.selectedIndex].value;
    //     if (selectedValue === "1") {
    //         window.location.href = "index.php?insertVocabEng";
    //     }
    // }
    
  </script>
 
</body>

</html>