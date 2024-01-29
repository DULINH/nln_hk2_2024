<?php

try {
    // Tạo kết nối PDO
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Kiểm tra nếu button submit được nhấn
        if (isset($_POST['submit'])) {
            $evocab_tieng_anh = $_POST['evocab_tieng_anh'];
            $evocab_tieng_viet = $_POST['evocab_tieng_viet'];
            $evocab_example = $_POST['evocab_example'];
            $evocab_role = $_POST['evocab_role'];
            $evocab_pronounce = $_POST['evocab_pronounce'];
            $evocab_accessmode = $_POST['evocab_accessmode'];

            // Kiểm tra xem dữ liệu đã tồn tại trong bảng card chưa
            $check_query = "SELECT * FROM vocab_eng 
                            WHERE evocab_tieng_anh = :evocab_tieng_anh";
            $check_stmt = $pdo->prepare($check_query);
            $check_stmt->bindParam(':evocab_tieng_anh', $evocab_tieng_anh, PDO::PARAM_STR);
            $check_stmt->execute();

            if ($check_stmt->rowCount() > 0) {
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
            } else {
                // Thêm dữ liệu vào bảng vocab_eng
                $insert_query = "INSERT INTO vocab_eng (evocab_tieng_anh, evocab_tieng_viet, evocab_example, evocab_role, evocab_pronounce, evocab_accessmode)
                VALUES (:evocab_tieng_anh, :evocab_tieng_viet, :evocab_example, :evocab_role, :evocab_pronounce, :evocab_accessmode)";
                $insert_stmt = $pdo->prepare($insert_query);
                $insert_stmt->bindParam(':evocab_tieng_anh', $evocab_tieng_anh, PDO::PARAM_STR);
                $insert_stmt->bindParam(':evocab_tieng_viet', $evocab_tieng_viet, PDO::PARAM_STR);
                $insert_stmt->bindParam(':evocab_example', $evocab_example, PDO::PARAM_STR);
                $insert_stmt->bindParam(':evocab_role', $evocab_role, PDO::PARAM_STR);
                $insert_stmt->bindParam(':evocab_pronounce', $evocab_pronounce, PDO::PARAM_STR);
                $insert_stmt->bindParam(':evocab_accessmode', $evocab_accessmode, PDO::PARAM_STR);
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
            }
        }
    }
    
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
try {
  if (isset($_POST['update_btn'])) {
    // Code để cập nhật dữ liệu trong bảng vocab_eng
    $evocab_tieng_anh = $_POST['evocab_tieng_anh']; // Thay thế bằng điều kiện cần
    $evocab_tieng_viet = $_POST['evocab_tieng_viet'];
    $evocab_example = $_POST['evocab_example'];
    $evocab_role = $_POST['evocab_role'];
    $evocab_pronounce = $_POST['evocab_pronounce'];
    $evocab_accessmode = $_POST['evocab_accessmode'];
    $evocab_id = $_POST['evocab_id'];

    $update_query = "UPDATE vocab_eng SET evocab_tieng_anh = :evocab_tieng_anh, evocab_tieng_viet = :evocab_tieng_viet, evocab_example = :evocab_example, evocab_role = :evocab_role, evocab_pronounce = :evocab_pronounce, evocab_accessmode = :evocab_accessmode WHERE evocab_id = :evocab_id";
    $update_stmt = $pdo->prepare($update_query);
    $update_stmt->bindParam(':evocab_tieng_anh', $evocab_tieng_anh, PDO::PARAM_STR);
    $update_stmt->bindParam(':evocab_tieng_viet', $evocab_tieng_viet, PDO::PARAM_STR);
    $update_stmt->bindParam(':evocab_example', $evocab_example, PDO::PARAM_STR);
    $update_stmt->bindParam(':evocab_role', $evocab_role, PDO::PARAM_STR);
    $update_stmt->bindParam(':evocab_pronounce', $evocab_pronounce, PDO::PARAM_STR);
    $update_stmt->bindParam(':evocab_accessmode', $evocab_accessmode, PDO::PARAM_STR);
    $update_stmt->bindParam(':evocab_id', $evocab_id, PDO::PARAM_STR);
    $update_stmt->execute();
  }
}catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
  
  
if (isset($_POST['delete_btn'])) {
  // Code để xóa dữ liệu từ bảng vocab_eng
  $evocab_tieng_anh = $_POST['evocab_tieng_anh']; // Thay thế bằng điều kiện cần

  $delete_query = "DELETE FROM vocab_eng WHERE evocab_tieng_anh = :evocab_tieng_anh";
  $delete_stmt = $pdo->prepare($delete_query);
  $delete_stmt->bindParam(':evocab_tieng_anh', $evocab_tieng_anh, PDO::PARAM_STR);
  $delete_stmt->execute();
}
?>




