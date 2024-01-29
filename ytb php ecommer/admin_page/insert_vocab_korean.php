<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $kvocab_tieng_han = $_POST['kvocab_tieng_han'];
    $kvocab_tieng_viet = $_POST['kvocab_tieng_viet'];
    $kvocab_example = $_POST['kvocab_example'];
    $kvocab_role = $_POST['kvocab_role'];
    $kvocab_pronounce = $_POST['kvocab_pronounce'];
    $kvocab_accessmode = $_POST['kvocab_accessmode'];

    try {
        // Kiểm tra xem dữ liệu đã tồn tại trong bảng chưa
        $check_query = "SELECT * FROM vocab_korean WHERE kvocab_tieng_han = :kvocab_tieng_han";
        $check_stmt = $pdo->prepare($check_query);
        $check_stmt->bindParam(':kvocab_tieng_han', $kvocab_tieng_han, PDO::PARAM_STR);
        $check_stmt->execute();

        // Nếu dữ liệu không tồn tại, thực hiện INSERT
        if ($check_stmt->rowCount() == 0) {
            $insert_query = "INSERT INTO vocab_korean 
                (kvocab_tieng_han, kvocab_tieng_viet, kvocab_example, kvocab_role, kvocab_pronounce, kvocab_accessmode)
                VALUES (:kvocab_tieng_han, :kvocab_tieng_viet, :kvocab_example, :kvocab_role, :kvocab_pronounce, :kvocab_accessmode)";
            $insert_stmt = $pdo->prepare($insert_query);
            $insert_stmt->bindParam(':kvocab_tieng_han', $kvocab_tieng_han, PDO::PARAM_STR);
            $insert_stmt->bindParam(':kvocab_tieng_viet', $kvocab_tieng_viet, PDO::PARAM_STR);
            $insert_stmt->bindParam(':kvocab_example', $kvocab_example, PDO::PARAM_STR);
            $insert_stmt->bindParam(':kvocab_role', $kvocab_role, PDO::PARAM_STR);
            $insert_stmt->bindParam(':kvocab_pronounce', $kvocab_pronounce, PDO::PARAM_STR);
            $insert_stmt->bindParam(':kvocab_accessmode', $kvocab_accessmode, PDO::PARAM_STR);
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
    // Code để cập nhật dữ liệu trong bảng vocab_korean
    $kvocab_tieng_han = $_POST['kvocab_tieng_han']; // Thay thế bằng điều kiện cần
    $kvocab_tieng_viet = $_POST['kvocab_tieng_viet'];
    $kvocab_example = $_POST['kvocab_example'];
    $kvocab_role = $_POST['kvocab_role'];
    $kvocab_pronounce = $_POST['kvocab_pronounce'];
    $kvocab_accessmode = $_POST['kvocab_accessmode'];
    $kvocab_id = $_POST['kvocab_id'];

    $update_query = "UPDATE vocab_korean SET kvocab_tieng_han = :kvocab_tieng_han, kvocab_tieng_viet = :kvocab_tieng_viet, kvocab_example = :kvocab_example, kvocab_role = :kvocab_role, kvocab_pronounce = :kvocab_pronounce, kvocab_accessmode = :kvocab_accessmode WHERE kvocab_id = :kvocab_id";
    $update_stmt = $pdo->prepare($update_query);
    $update_stmt->bindParam(':kvocab_tieng_viet', $kvocab_tieng_viet, PDO::PARAM_STR);
    $update_stmt->bindParam(':kvocab_example', $kvocab_example, PDO::PARAM_STR);
    $update_stmt->bindParam(':kvocab_role', $kvocab_role, PDO::PARAM_STR);
    $update_stmt->bindParam(':kvocab_pronounce', $kvocab_pronounce, PDO::PARAM_STR);
    $update_stmt->bindParam(':kvocab_accessmode', $kvocab_accessmode, PDO::PARAM_STR);
    $update_stmt->bindParam(':kvocab_tieng_han', $kvocab_tieng_han, PDO::PARAM_STR);
    $update_stmt->bindParam(':kvocab_id', $kvocab_id, PDO::PARAM_STR);
    $update_stmt->execute();
  }
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
  
  
if (isset($_POST['delete_btn'])) {
  // Code để xóa dữ liệu từ bảng vocab_korean
  $kvocab_tieng_han = $_POST['kvocab_tieng_han']; // Thay thế bằng điều kiện cần

  $delete_query = "DELETE FROM vocab_korean WHERE kvocab_tieng_han = :kvocab_tieng_han";
  $delete_stmt = $pdo->prepare($delete_query);
  $delete_stmt->bindParam(':kvocab_tieng_han', $kvocab_tieng_han, PDO::PARAM_STR);
  $delete_stmt->execute();
}

?>


