<?php
// Redirect the user to a different page with query parameters
// header("Location: index.php?grammarly");
// require "./database/connection.php";
require ('./user_page/user_reg.php');
require ('./user_page/user_login.php');
require ('./view/_header.php');
// require ('./view/_home_page_main.php');
require ('./check.php');
?>



  <?php 
    $isAvaileble = true;
    if($isAvaileble) {
      include('./view/_home_page_main.php');
      $isAvaileble = false;
    }
    if(!$isAvaileble and isset($_GET['cuahang'])) { 
      include('./web_page/cuahang.php');
    }
    if(isset($_GET['grammarly'])) {
      include('./web_page/Grammarly.php');
    }
    if(isset($_GET['giohang'])) {
      include('./web_page/giohang.php');
    }
    if(isset($_GET['eng_test'])) {
      include('./web_page/eng_course_test.php');
    }
    if(isset($_GET['eng_video'])) {
      include('./web_page/eng_video.php');
    }
    if(isset($_GET['eng_flashcard'])) {
      include('./web_page/eng_flashcard.php');
    }
    if(isset($_GET['user_profile'])) {
      include('./user_page/user_info.php');
    }
    if(isset($_GET['404'])) {
      include('./web_page/error.php');
    }
    if(isset($_GET['detail'])) {
      include('./web_page/details.php');
    }
    for ($i = 1; $i <= 12; $i++) {
        $courseEngVocab = 'course_eng_vocab' . $i;
        $courseKoreanVocab = 'course_korean_vocab' . $i;
        $courseChineseVocab = 'course_chinese_vocab' . $i;
        $courseEngExcercise = 'course_eng_excercise' . $i;
        $courseKoreanExcercise = 'course_korean_excercise' . $i;
        $courseChineseExcercise = 'course_chinese_excercise' . $i;

        // Kiểm tra xem tham số $_GET có tồn tại và có giá trị không rỗng
        if (isset($_GET[$courseEngVocab])) {
            include('./web_page/course_eng_vocab.php');
            break; // Thoát khỏi vòng lặp khi tìm thấy
        }
        if (isset($_GET[$courseEngExcercise])) {
            include('./web_page/course_eng_excercise.php');
            break; // Thoát khỏi vòng lặp khi tìm thấy
        }
        if (isset($_GET[$courseKoreanVocab])) {
            include('./web_page/course_korean_vocab.php');
            break; // Thoát khỏi vòng lặp khi tìm thấy
        }
        if (isset($_GET[$courseKoreanExcercise])) {
            include('./web_page/course_korean_excercise.php');
            break; // Thoát khỏi vòng lặp khi tìm thấy
        }
        if (isset($_GET[$courseChineseVocab])) {
            include('./web_page/course_chinese_vocab.php');
            break; // Thoát khỏi vòng lặp khi tìm thấy
        }
        if (isset($_GET[$courseChineseExcercise])) {
            include('./web_page/course_chinese_excercise.php');
            break; // Thoát khỏi vòng lặp khi tìm thấy
        }
    }
    ?>

<?php 
require ('./view/_footer.php');
?>

<script>
    setTimeout(function() {
        document.getElementById('customAlert').classList.add('d-none');
    }, 2000);
  // Lấy URL hiện tại
  var currentURL = window.location.href;

  // Kiểm tra xem URL có chứa chuỗi "cuahang" không
  if (currentURL.includes('cuahang')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('grammarly')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('giohang')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('cuahang')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('cuahang')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('cuahang')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('eng_test')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('eng_video')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('eng_flashcard')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('user_profile')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('404')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
  if (currentURL.includes('detail')) {
      // Nếu có, làm rỗng phần nội dung chính
      document.getElementById('index_home_page').innerHTML = "";
  }
    // Lặp qua các số từ 1 đến 12
  for (var i = 1; i <= 12; i++) {
      var courseEngVocabString = 'course_eng_vocab' + i;
      var courseKoreanVocabString = 'course_korean_vocab' + i;
      var courseChineseVocabString = 'course_chinese_vocab' + i;
      var courseEngExcerciseString = 'course_eng_excercise' + i;
      var courseKoreanExcerciseString = 'course_korean_excercise' + i;
      var courseChineseExcerciseString = 'course_chinese_excercise' + i;

      // Kiểm tra xem URL có chứa chuỗi "cuahang{i}" không
      if (currentURL.includes(courseEngVocabString)) {
          // Nếu có, làm rỗng phần nội dung chính
          document.getElementById('index_home_page').innerHTML = "";
          break; // Thoát khỏi vòng lặp khi tìm thấy
      }
      if (currentURL.includes(courseKoreanVocabString)) {
          // Nếu có, làm rỗng phần nội dung chính
          document.getElementById('index_home_page').innerHTML = "";
          break; // Thoát khỏi vòng lặp khi tìm thấy
      }
      if (currentURL.includes(courseChineseVocabString)) {
          // Nếu có, làm rỗng phần nội dung chính
          document.getElementById('index_home_page').innerHTML = "";
          break; // Thoát khỏi vòng lặp khi tìm thấy
      }
      if (currentURL.includes(courseEngExcerciseString)) {
          // Nếu có, làm rỗng phần nội dung chính
          document.getElementById('index_home_page').innerHTML = "";
          break; // Thoát khỏi vòng lặp khi tìm thấy
      }
      if (currentURL.includes(courseKoreanExcerciseString)) {
          // Nếu có, làm rỗng phần nội dung chính
          document.getElementById('index_home_page').innerHTML = "";
          break; // Thoát khỏi vòng lặp khi tìm thấy
      }
      if (currentURL.includes(courseChineseExcerciseString)) {
          // Nếu có, làm rỗng phần nội dung chính
          document.getElementById('index_home_page').innerHTML = "";
          break; // Thoát khỏi vòng lặp khi tìm thấy
      }
  }
</script>

