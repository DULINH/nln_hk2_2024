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
</head>

<body>
<div class="container-fluid text-center text-dark"
      style="height: 90px; padding-top: 20px;">
      <h3>Từ vựng Tiếng Anh</h3>
    </div>
    <!-- Main Content -->
    <div class="container p-3 my-5 bg-light border border-primary">
        <!-- DataTable Code starts -->
        <table id="example" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                  <th>Vocabulary</th>
                  <th>Meaning</th>
                  <th>Example</th>
                  <th>Role</th>
                  <th>Pronounce</th>
                  <th>Access Mode</th>
                  <th>Create Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
            try {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "nln_hk2_2024";

                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT evocab_tieng_anh, evocab_tieng_viet, evocab_example, evocab_role, evocab_pronounce, evocab_accessmode, evocab_createtime FROM vocab_eng";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    echo "<tr>
                            <td>{$row['evocab_tieng_anh']}</td>
                            <td>{$row['evocab_tieng_viet']}</td>
                            <td>{$row['evocab_example']}</td>
                            <td>{$row['evocab_role']}</td>
                            <td>{$row['evocab_pronounce']}</td>
                            <td>{$row['evocab_accessmode']}</td>
                            <td>{$row['evocab_createtime']}</td>
                        </tr>";
                }
            } catch (PDOException $e) {
                echo "Kết nối không thành công: " . $e->getMessage();
            }
            ?>
            </tbody>
        </table>
    </div>

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

    <!-- Custom JS -->
    <script src="script.js"></script>
</body>

</html>