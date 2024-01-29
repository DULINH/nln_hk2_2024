<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $cvocab_tieng_trung = $_POST['cvocab_tieng_trung'];
    $cvocab_tieng_viet = $_POST['cvocab_tieng_viet'];
    $cvocab_example = $_POST['cvocab_example'];
    $cvocab_role = $_POST['cvocab_role'];
    $cvocab_pronounce = $_POST['cvocab_pronounce'];
    $cvocab_accessmode = $_POST['cvocab_accessmode'];

    try {
        // Kiểm tra xem dữ liệu đã tồn tại trong bảng chưa
        $check_query = "SELECT * FROM vocab_chinese WHERE cvocab_tieng_trung = :cvocab_tieng_trung";
        $check_stmt = $pdo->prepare($check_query);
        $check_stmt->bindParam(':cvocab_tieng_trung', $cvocab_tieng_trung, PDO::PARAM_STR);
        $check_stmt->execute();

        // Nếu dữ liệu không tồn tại, thực hiện INSERT
        if ($check_stmt->rowCount() == 0) {
            $insert_query = "INSERT INTO vocab_chinese 
                (cvocab_tieng_trung, cvocab_tieng_viet, cvocab_example, cvocab_role, cvocab_pronounce, cvocab_accessmode)
                VALUES (:cvocab_tieng_trung, :cvocab_tieng_viet, :cvocab_example, :cvocab_role, :cvocab_pronounce, :cvocab_accessmode)";
            $insert_stmt = $pdo->prepare($insert_query);
            $insert_stmt->bindParam(':cvocab_tieng_trung', $cvocab_tieng_trung, PDO::PARAM_STR);
            $insert_stmt->bindParam(':cvocab_tieng_viet', $cvocab_tieng_viet, PDO::PARAM_STR);
            $insert_stmt->bindParam(':cvocab_example', $cvocab_example, PDO::PARAM_STR);
            $insert_stmt->bindParam(':cvocab_role', $cvocab_role, PDO::PARAM_STR);
            $insert_stmt->bindParam(':cvocab_pronounce', $cvocab_pronounce, PDO::PARAM_STR);
            $insert_stmt->bindParam(':cvocab_accessmode', $cvocab_accessmode, PDO::PARAM_STR);
            $insert_stmt->execute();

            echo '
                  <div id="successMessage"
                    style="
                      display: none; position: fixed;
                      top: 20%; 
                      left: 50%; 
                      transform: translate(-50%, -50%); 
                      padding: 20px;
                      border-radius: 5px;
                      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                    "
                    class="alert alert-success alert-dismissible fade show text-center" role="alert"
                    >
                    <h6>Thêm từ vựng thành công</h6>
                  </div>
                ';
        } else {
          echo '
          <div id="successMessage"
            style="
              display: none; position: fixed;
              top: 20%; 
              left: 50%; 
              transform: translate(-50%, -50%); 
              padding: 20px;
              border-radius: 5px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            "
            class="alert alert-danger alert-dismissible fade show text-center" role="alert"
            >
            <h6>Từ vựng đã tồn tại trong cơ sở dữ liệu</h6>
          </div>
        ';
        }
    } catch(PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . '</div>';
    }
}

try {
  if (isset($_POST['update_btn'])) {
    // Code để cập nhật dữ liệu trong bảng cvocab
    $cvocab_tieng_trung = $_POST['cvocab_tieng_trung']; // Thay thế bằng điều kiện cần
    $cvocab_tieng_viet = $_POST['cvocab_tieng_viet'];
    $cvocab_example = $_POST['cvocab_example'];
    $cvocab_role = $_POST['cvocab_role'];
    $cvocab_pronounce = $_POST['cvocab_pronounce'];
    $cvocab_accessmode = $_POST['cvocab_accessmode'];
    $cvocab_id = $_POST['cvocab_id'];

    $update_query = "UPDATE vocab_chinese SET cvocab_tieng_trung = :cvocab_tieng_trung, cvocab_tieng_viet = :cvocab_tieng_viet, cvocab_example = :cvocab_example, cvocab_role = :cvocab_role, cvocab_pronounce = :cvocab_pronounce, cvocab_accessmode = :cvocab_accessmode WHERE cvocab_id = :cvocab_id";
    $update_stmt = $pdo->prepare($update_query);
    $update_stmt->bindParam(':cvocab_tieng_viet', $cvocab_tieng_viet, PDO::PARAM_STR);
    $update_stmt->bindParam(':cvocab_example', $cvocab_example, PDO::PARAM_STR);
    $update_stmt->bindParam(':cvocab_role', $cvocab_role, PDO::PARAM_STR);
    $update_stmt->bindParam(':cvocab_pronounce', $cvocab_pronounce, PDO::PARAM_STR);
    $update_stmt->bindParam(':cvocab_accessmode', $cvocab_accessmode, PDO::PARAM_STR);
    $update_stmt->bindParam(':cvocab_tieng_trung', $cvocab_tieng_trung, PDO::PARAM_STR);
    $update_stmt->bindParam(':cvocab_id', $cvocab_id, PDO::PARAM_STR);
    $update_stmt->execute();
  }
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
  
  
if (isset($_POST['delete_btn'])) {
  // Code để xóa dữ liệu từ bảng cvocab
  $cvocab_tieng_han = $_POST['cvocab_tieng_trung']; // Thay thế bằng điều kiện cần

  $delete_query = "DELETE FROM vocab_chinese WHERE cvocab_tieng_trung = :cvocab_tieng_trung";
  $delete_stmt = $pdo->prepare($delete_query);
  $delete_stmt->bindParam(':cvocab_tieng_trung', $cvocab_tieng_han, PDO::PARAM_STR);
  $delete_stmt->execute();
}

?>

