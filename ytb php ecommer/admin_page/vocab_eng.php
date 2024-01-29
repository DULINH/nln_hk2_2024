<?php
require ('./insert_vocab_eng.php');
try {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "nln_hk2_2024";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT evocab_id, evocab_tieng_anh, evocab_tieng_viet, evocab_example, evocab_role, evocab_pronounce, evocab_accessmode, evocab_createtime FROM vocab_eng";
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- DataTable CSS  -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

  <title>DataTable | devRasen</title>
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


  <!-- Modal 1 Add -->
  <div id="modal_add" class="modal_custom">
    <div>
      <!-- The Modal -->

      <span class="close">&times;</span>
      <div class="container mt-10 mb-5" style="width: 500px;">
        <h2 class="text-center">Thêm từ vựng mới</h2>
        <form action="index.php?vocab_eng" method="POST">
          <!-- Form fields -->
          <div class="form-group">
            <label for="evocab_tieng_anh">Tiếng Anh:</label>
            <input type="text" class="form-control" id="evocab_tieng_anh" name="evocab_tieng_anh" required>
          </div>
          <div class="form-group">
            <label for="evocab_tieng_viet">Tiếng Việt:</label>
            <input type="text" class="form-control" id="evocab_tieng_viet" name="evocab_tieng_viet" required>
          </div>
          <div class="form-group">
            <label for="evocab_example">Ví dụ:</label>
            <textarea class="form-control" id="evocab_example" name="evocab_example" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="evocab_role">Vai trò:</label>
            <input type="text" class="form-control" id="evocab_role" name="evocab_role" required>
          </div>
          <div class="form-group">
            <label for="evocab_pronounce">Phát âm:</label>
            <input type="text" class="form-control" id="evocab_pronounce" name="evocab_pronounce" required>
          </div>
          <div class="form-group">
            <label for="evocab_accessmode">Quyền truy cập:</label>
            <input type="text" class="form-control" id="evocab_accessmode" name="evocab_accessmode" required>
          </div>
          <button type="submit" class="btn btn-primary mt-5" name="submit">Thêm từ vựng</button>
        </form>
      </div>
    </div>
  </div>

  <div class="container-fluid text-decoration-none" style="margin-bottom: 50px;">
    <!-- Button 1 to open Modal 1 -->
    <button id="openModal_add" class="btn btn-info float-start">Thêm từ vựng</button>
    <button class="float-end btn btn-info">Theo khóa học</button>
  </div>
  <div class="container-fluid text-center text-dark" style="height: 90px; padding-top: 20px;">
    <h3>Từ vựng Tiếng Anh</h3>
  </div>
  <!-- Main Content -->
  <div class="container p-3 my-5 bg-light border border-primary">
    <!-- DataTable Code starts -->
    <table id="example" class="table table-striped nowrap" style="width:100%">
      <thead>
        <tr>
          <th>id</th>
          <th>Vocabulary</th>
          <th>Meaning</th>
          <th>Example</th>
          <th>Role</th>
          <th>Pronounce</th>
          <th>Access Mode</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $index => $row): ?>
        <tr>
          <td>
            <?php echo $row['evocab_id']; ?>
          </td>
          <td class="text-truncate" style="max-width: 100px;">
            <?php echo $row['evocab_tieng_anh']; ?>
          </td>
          <td class="text-truncate" style="max-width: 100px;">
            <?php echo $row['evocab_tieng_viet']; ?>
          </td>
          <td class="text-truncate" style="max-width: 230px;">
            <?php echo $row['evocab_example']; ?>
          </td>
          <td>
            <?php echo $row['evocab_role']; ?>
          </td>
          <td>
            <?php echo $row['evocab_pronounce']; ?>
          </td>
          <td>
            <?php echo $row['evocab_accessmode']; ?>
          </td>
          
          <td>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?php echo $index + 1; ?>">
              <i class="fas fa-sync-alt"></i>
            </button>
          </td>
          <td>
            <form method="POST" action="index.php?vocab_eng"
              onsubmit="return confirm('Are you sure you want to delete this record?')">
              <input type="hidden" name="evocab_tieng_anh" value="<?php echo $row['evocab_tieng_anh']; ?>">
              <button type="submit" class="btn btn-danger" name="delete_btn">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <?php foreach ($result as $index => $row): ?>
  <div class="modal fade" id="modal<?php echo $index + 1; ?>" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Cập nhật từ vựng</h5>

        </div>
        <div class="modal-body">
          <form method="POST" action="index.php?vocab_eng">
            <input type="hidden" name="evocab_id" value="<?php echo $row['evocab_id']; ?>">
            <div class="mb-3">
              <label for="evocab_tieng_anh" class="form-label">Tiếng Anh</label>
              <input type="text" class="form-control" id="evocab_tieng_anh" name="evocab_tieng_anh"
                value="<?php echo $row['evocab_tieng_anh']; ?>">
            </div>
            <div class="mb-3">
              <label for="evocab_tieng_viet" class="form-label">Tiếng Việt</label>
              <input type="text" class="form-control" id="evocab_tieng_viet" name="evocab_tieng_viet"
                value="<?php echo $row['evocab_tieng_viet']; ?>">
            </div>
            <div class="mb-3">
              <label for="evocab_example" class="form-label">Ví dụ</label>
              <textarea class="form-control" id="evocab_example"
                name="evocab_example"><?php echo $row['evocab_example']; ?></textarea>
            </div>
            <div class="mb-3">
              <label for="evocab_role" class="form-label">Vai trò</label>
              <input type="text" class="form-control" id="evocab_role" name="evocab_role"
                value="<?php echo $row['evocab_role']; ?>">
            </div>
            <div class="mb-3">
              <label for="evocab_pronounce" class="form-label">Phát âm</label>
              <input type="text" class="form-control" id="evocab_pronounce" name="evocab_pronounce"
                value="<?php echo $row['evocab_pronounce']; ?>">
            </div>
            <div class="mb-3">
              <label for="evocab_accessmode" class="form-label">Quyền truy cập</label>
              <input type="text" class="form-control" id="evocab_accessmode" name="evocab_accessmode"
                value="<?php echo $row['evocab_accessmode']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update_btn">Update</button>
            <button type="submit" class="btn btn-danger" name="delete_btn">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>



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

    const modal = document.getElementById('modal_add');
    const openButton = document.getElementById('openModal_add');
    const closeButton = document.querySelector('.close');

    function closeModal() {
      modal.style.display = 'none';
    }

    function openModal() {
      modal.style.display = 'block';
    }

    openButton.addEventListener('click', openModal);
    closeButton.addEventListener('click', closeModal);

    window.addEventListener('click', function (event) {
      if (event.target === modal) {
        closeModal();
      }
    });

  </script>
</body>

</html>