<?php
$host = 'localhost';
$db   = 'nln_hk2_2024';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->query("SELECT evocab_tieng_anh, evocab_tieng_viet 
                        FROM vocab_eng 
                        WHERE evocab_accessmode = 1
                        ORDER BY RAND() 
                        LIMIT 1");
$flashcard = $stmt->fetch();


$stmtVocab = $pdo->query("SELECT evocab_tieng_anh, evocab_tieng_viet, evocab_example
                            FROM vocab_eng 
                            WHERE evocab_accessmode = 1");
$resultVovab = $stmtVocab->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flashcard App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .flashcard {
            width: 300px;
            height: 200px;
            cursor: pointer;
        }

        .center-text {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .search-input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container d-flex flex-column align-items-center justify-content-center min-vh-100 mt-5">
        <div class="card flashcard" onclick="waitAndFlip()">
            <div class="card-body center-text">
                <div class="card-text" id="front">
                    <?php echo $flashcard['evocab_tieng_anh']; ?>
                </div>
                <div class="card-text" id="back" style="display: none;">
                    <?php echo $flashcard['evocab_tieng_viet']; ?>
                </div>
            </div>
        </div>

        <form method="post" action="" class="mt-3">
            <div class="form-group">
                <label for="guessed_text">Đoán nghĩa từ vựng:</label>
                <input type="text" id="guessed_text" name="guessed_text" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Prev</button>
            <button type="submit" class="btn btn-secondary mt-2">Next</button>
        </form>

        <div class="container mt-5">
            <h2 class="mb-4">Từ vựng ở thẻ này</h2>

            <input type="text" class="form-control search-input" id="searchInput" placeholder="Search for names...">

            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Từ vựng</th>
                        <th>Nghĩa</th>
                        <th>Example</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultVovab as $row) { ?>
                        <tr>
                            <td><?php echo $row['evocab_tieng_anh']; ?></td>
                            <td><?php echo $row['evocab_tieng_viet']; ?></td>
                            <td><?php echo $row['evocab_example']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="wrongGuessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sai!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn đã chọn sai. Hãy thử lại!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let waiting = false;

        function waitAndFlip() {
            if (!waiting) {
                setTimeout(function () {
                    flipCard();
                }, 3000);
                waiting = true;
            } else {
                flipCard();
            }
        }

        function flipCard() {
            var front = document.getElementById('front');
            var back = document.getElementById('back');

            if (front.style.display === 'none') {
                front.style.display = 'block';
                back.style.display = 'none';
            } else {
                front.style.display = 'none';
                back.style.display = 'block';
            }

        }
    </script>
    <script>
        // Function to perform search
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector(".table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; // Assuming the search is based on the first column

                if (td) {
                    txtValue = td.textContent || td.innerText;

                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // Attach event listener to the search input
        document.getElementById("searchInput").addEventListener("input", searchTable);
    </script>

</body>
</html>



