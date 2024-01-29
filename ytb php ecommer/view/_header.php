<?php
    if (isset($_SESSION['users_id'])) {
      if (!isset($_SESSION['login_success'])) {
        $_SESSION['login_success'] = true;
          echo '<div id="customAlert" 
                      class="alert alert-success alert-dismissible fade show text-center d-flex align-items-center justify-content-center" 
                      role="alert"
                      style="width: 29vw; position: fixed;
                              top: 35%; 
                              left: 50%; 
                              transform: translate(-50%, -50%); 
                              width: 29vw;">
                      Login Successfully!!!
                </div>';
      }
    }
?>
<!doctype html>
<html lang="en">

<head>
  <title>HJ ENGLISH</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <!-- fontawesome scrip  -->
  <script src="https://kit.fontawesome.com/a69e533ba1.js" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- <script src="./script/js.js"></script> -->
  <link rel="stylesheet" href="index.css">

  <style>
    .modal_custom {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 600px;
      max-width: 90%;
      /* Đảm bảo modal không vượt quá 90% chiều rộng của màn hình */
      max-height: 90%;
      /* Đảm bảo modal không vượt quá 90% chiều rộng của màn hình */
      background-color: white;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      z-index: 100;
    }

    /* Close Button Style */
    .close {
      color: #aaa;
      font-size: 28px;
      font-weight: bold;
      display: flex;
      justify-content: flex-end;
      /* Đẩy nút sang bên phải */
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">HJ EngLish</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php?homepage">Home</a>
              </li>
              <?php 
                if (isset($_SESSION['users_id'])) {
                  echo "<li class='nav-item'>";
                    echo "<a class='nav-link active' aria-current='page' href='index.php?cuahang'>Cửa Hàng</a>";
                  echo "</li>";
                }
              ?>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Khóa Học
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Tiếng Anh
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 1
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_eng_vocab1">Từ Vựng và Ngữ pháp</a></li>
                          <li><a class="dropdown-item" href="index.php?course_eng_excercise1">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 2
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_eng_vocab2">Từ Vựng và Ngữ pháp</a></li>
                          <li><a class="dropdown-item" href="index.php?course_eng_excercise2">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 3
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_eng_vocab3">Từ Vựng và Ngữ pháp</a></li>
                          <li><a class="dropdown-item" href="index.php?course_eng_excercise3">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 4
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_eng_vocab4">Từ Vựng và Ngữ pháp</a></li>
                          <li><a class="dropdown-item" href="index.php?course_eng_excercise4">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 5
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_eng_vocab5">Từ Vựng và Ngữ pháp</a></li>
                          <li><a class="dropdown-item" href="index.php?course_eng_excercise5">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 6
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_eng_vocab6">Từ Vựng và Ngữ pháp</a></li>
                          <li><a class="dropdown-item" href="index.php?course_eng_excercise6">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 7
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_eng_vocab7">Từ Vựng và Ngữ pháp</a></li>
                          <li><a class="dropdown-item" href="index.php?course_eng_excercise7">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 8
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_eng_vocab8">Từ Vựng và Ngữ pháp</a></li>
                          <li><a class="dropdown-item" href="index.php?course_eng_excercise8">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 9
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_eng_vocab9">Từ Vựng và Ngữ pháp</a></li>
                          <li><a class="dropdown-item" href="index.php?course_eng_excercise9">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 10
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_eng_vocab10">Từ Vựng và Ngữ pháp</a></li>
                          <li><a class="dropdown-item" href="index.php?course_eng_excercise10">Exercise</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Tiếng Hàn
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 1
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_korean_vocab1">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_korean_excercise1">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 2
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_korean_vocab2">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_korean_excercise2">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 3
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_korean_vocab3">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_korean_excercise3">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 4
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_korean_vocab4">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_korean_excercise4">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 5
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_korean_vocab5">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_korean_excercise5">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 6
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_korean_vocab6">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_korean_excercise6">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 7
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_korean_vocab7">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_korean_excercise7">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 8
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_korean_vocab8">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_korean_excercise8">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 9
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_korean_vocab9">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_korean_excercise9">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 10
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_korean_vocab10">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_korean_excercise10">Exercise</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Tiếng Trung
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 1
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_chinese_vocab1">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_chinese_excercise1">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 2
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_chinese_vocab2">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_chinese_excercise2">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 3
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_chinese_vocab3">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_chinese_excercise3">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 4
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_chinese_vocab4">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_chinese_excercise4">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 5
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_chinese_vocab5">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_chinese_excercise5">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 6
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_chinese_vocab6">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_chinese_excercise6">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 7
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_chinese_vocab7">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_chinese_excercise7">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 8
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_chinese_vocab8">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_chinese_excercise8">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 9
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_chinese_vocab9">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_chinese_excercise9">Exercise</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropend">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Bài 10
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="index.php?course_chinese_vocab10">Từ Vựng và Ngữ pháp</a>
                          </li>
                          <li><a class="dropdown-item" href="index.php?course_chinese_excercise10">Exercise</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Materials
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Tiếng Anh
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">File PDF</a></li>
                      <li><a class="dropdown-item" href="#">Bài Mẫu</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Tiếng Hàn
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">File PDF</a></li>
                      <li><a class="dropdown-item" href="#">Bài Mẫu</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Tiếng Trung
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">File PDF</a></li>
                      <li><a class="dropdown-item" href="#">Bài Mẫu</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Videos Tham Khảo
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="index.php?eng_video">Tiếng Anh</a></li>
                      <li><a class="dropdown-item" href="#">Tiếng Hàn</a></li>
                      <li><a class="dropdown-item" href="#">Tiếng Trung</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Test
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Tiếng Anh
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="index.php?eng_test">Trắc Nghiệm</a></li>
                      <li><a class="dropdown-item" href="index.php?eng_flashcard">Thẻ từ vựng</a></li>
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
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.php?grammarly">Grammarly Check (Eng Only)</a>
                  </li>
                </ul>
              </li>
              <?php 
                if (isset($_SESSION['users_id'])) {
                    echo "<li class='nav-item dropdown'>";
                    echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown'
                              aria-expanded='false'>";
                    echo "Giỏ Hàng";
                    echo "</a>";
                    echo "<ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                    echo "<li><a class='dropdown-item' href='index.php?giohang'>Xem giỏ hàng</a></li>";
                    echo "<li><a class='dropdown-item' href='#'>Thanh Toán</a></li>";
                    echo "<li><a class='dropdown-item' href='#'>Total: " . number_format($totalPrice, 2) . "đ</a></li>";
                    echo "</ul>";
                    echo "</li>";
                }
                ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Tài Khoản
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Log In</a>
                  </li>
                  <!-- Button trigger modal -->
                  <li>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">Sign In</a>
                    <!-- <button id="openModal_reg" class="dropdown-item">Sign In</button> -->
                  </li>
                </ul>
              </li>
            </ul>
            <form>
              <div>
                <?php
                  if (isset($_SESSION['users_id'])) {
                      echo "<div class='btn-group dropstart'>
                          <button type='button' class='btn btn-secondary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
                            {$_SESSION['users_name']}
                          </button>
                          <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='./user_page/logout.php'>Logout</a></li>
                            <li><a class='dropdown-item' href='index.php?user_profile'>Profile</a></li>
                          </ul>
                        </div>";
                  } else {
                      echo "Hi User";
                  }
                  ?>
              </div>
            </form>
          </div>
        </div>
      </nav>
    </div>


    <!-- Modal log in-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="index.php" method="post">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" id="form2Example1" name="username" class="form-control" required />
                <label class="form-label" for="form2Example1">UserName</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form2Example2" name="password" class="form-control" required />
                <label class="form-label" for="form2Example2">Password</label>
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                  </div>
                </div>

                <div class="col">
                  <!-- Simple link -->
                  <a href="#!" data-target="#pwdModal" data-toggle="modal">Forgot password?</a>
                </div>
              </div>

              <!-- Submit button -->
              <!-- <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button> -->

              <!-- Register buttons -->
              <div class="text-center">
                <p>Not a member? <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal1">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name = "submitted" class="btn btn-primary">Log In</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end modal log in  -->



    <!-- Sign in modal  -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Register Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <main class="form-signup">
                <!-- Move the form opening tag here -->
                <form action="index.php" method="post" class="row g-3">
                  <h1 class="h2 mb-2 fw-normal">Join our Community</h1>
                  <div class="col-md-6">
                    <label for="inputName" class="form-label">UserName: </label>
                    <input type="text" name="users_name" class="form-control" id="inputName" required />
                  </div>
                  <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Email: </label>
                    <input type="email" name="users_email" class="form-control" id="inputEmail" required />
                  </div>
                  <div class="col-12">
                    <label for="inputAge" class="form-label">Age: </label>
                    <input type="number" name="users_age" class="form-control" id="inputAge" />
                  </div>
                  <div class="col-md-6">
                    <label for="inputGender" class="form-label">Gender: </label>
                    <select name="users_gender" class="form-select" id="inputGender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="inputPwd" class="form-label">Password: </label>
                    <input type="password" name="users_pwd" class="form-control" id="inputPwd" required />
                  </div>
                  <div class="col-12">
                    <label for="inputPwdConfirm" class="form-label">Confirm Password: </label>
                    <input type="password" name="users_pwd_confirm" class="form-control" id="inputPwdConfirm"
                      required />
                  </div>
              </main>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="register" class="btn btn-primary">Register!</button>
          </div>
          </form>
        </div>
      </div>
    </div>


    <!--modal reset pwd-->
    <div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h1 class="text-center">What's My Password?</h1>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="text-center">

                    <p>If you have forgotten your password you can reset it here.</p>
                    <div class="panel-body">
                      <fieldset>
                        <div class="form-group">
                          <input class="form-control input-lg" placeholder="E-mail Address" name="email" type="email">
                        </div>
                        <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                      </fieldset>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-md-12">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </header>