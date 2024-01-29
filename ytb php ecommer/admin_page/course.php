<!-- Tiêu Đề -->
<!-- button điều hướng  -->
<!-- Bảng từ vựng cho từng bài  -->
<!-- Ngữ pháp kèm ví dụ -->
<?php
try {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "nln_hk2_2024";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT eng_id, eng_course_topic, eng_course_info FROM eng_course";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Kết nối không thành công: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Random Color Hex</title>
  <!-- DataTable CSS  -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

  <style>
    #colorDisplay {
      width: 200px;
      height: 200px;
      border: 1px solid #000;
      cursor: pointer;
    }
  </style>
</head>

<body>
<main>
  <section>
    <h2>Topic: Am/Is/Are</h2>
  </section>
  <section>
    <h2>Ngữ Pháp</h2>
  </section>
<div class="container-fluid text-center pt-5" style="height: 90px; padding-top: 20px;">
      
    <h3>Từ vựng Bài
      <?php echo "1" ?>
    </h3>
  </div>

  <div class="container p-3 my-5 bg-light border border-primary">
    <!-- DataTable Code starts -->
    <table id="example" class="table table-striped nowrap" style="width:100%">
      <thead>
        <tr>
          <th>First name</th>
          <th>Last name</th>
          <th>Position</th>
          <th>Office</th>
          <th>Age</th>
          <th>Start date</th>
          <th>Salary</th>
          <th>Extn.</th>
          <th>E-mail</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $index => $row): ?>
        <tr>
          <td>
            <?php ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>
  
  
  <!-- <h1>Random Color Hex</h1>
  <div id="colorDisplay"></div>
  <p>Color Hex: <span id="hexValue">#000000</span></p>
  <button onclick="generateRandomColor()">Random Color</button>

  <script>
    const colorDisplay = document.getElementById('colorDisplay');
    const hexValue = document.getElementById('hexValue');

    function generateRandomColor() {
      const randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
      colorDisplay.style.backgroundColor = randomColor;
      hexValue.textContent = randomColor.toUpperCase();
    }
  </script> -->
  <!-- DataTable JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
  <script>
    $("#example").DataTable({
      responsive: true,
    });
  </script>
</body>

</html>