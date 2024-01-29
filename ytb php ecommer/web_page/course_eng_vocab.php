<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nln_hk2_2024";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($_GET as $key => $value) {
        $lastKeyVocab = substr($key, -1);
        $lasttwoKeyVocab = substr($key, -2);

        if (is_numeric($lastKeyVocab) || is_numeric($lasttwoKeyVocab)) {
            // Sử dụng truy vấn có tham số để ngăn chặn SQL injection
            $stmtFetchOneVocab = $conn->prepare("SELECT * FROM vocab_eng WHERE evocab_accessmode = :lastKeyVocab OR evocab_accessmode = :lasttwoKeyVocab");
            $stmtFetchOneVocab->bindParam(":lastKeyVocab", $lastKeyVocab, PDO::PARAM_STR);
            $stmtFetchOneVocab->bindParam(":lasttwoKeyVocab", $lasttwoKeyVocab, PDO::PARAM_STR);
            $stmtFetchOneVocab->execute();

            $resultFetchOneVocab = $stmtFetchOneVocab->fetchAll(PDO::FETCH_ASSOC);

            if ($resultFetchOneVocab) {
                foreach ($resultFetchOneVocab as $rowFetchOneVocab) {
                }
            } else {
                echo "Không có dữ liệu được tìm thấy.";
            }
        }
    }

    // Xử lý dữ liệu dựa trên các tham số $_GET
    foreach ($_GET as $key => $value) {
        // Kiểm tra xem ký tự cuối cùng của key có phải là giá trị số không
        $lastKey = substr($key, -1);
        $lastTwoCharacters = substr($key, -2);

        if (is_numeric($lastKey) || is_numeric($lastTwoCharacters)) {
            // Sử dụng truy vấn có tham số để ngăn chặn SQL injection
            $stmtFetchOne = $conn->prepare("SELECT * FROM eng_course WHERE eng_id = :lastKey OR eng_id = :lastTwoCharacters");
            $stmtFetchOne->bindParam(":lastKey", $lastKey, PDO::PARAM_STR);
            $stmtFetchOne->bindParam(":lastTwoCharacters", $lastTwoCharacters, PDO::PARAM_STR);
            $stmtFetchOne->execute();

            $resultFetchOne = $stmtFetchOne->fetchAll(PDO::FETCH_ASSOC);

            if ($resultFetchOne) {
                foreach ($resultFetchOne as $rowFetchOne) {
                }
            } else {
                echo "Không có dữ liệu được tìm thấy.";
            }
        }
    }

    foreach ($_GET as $key => $value) {
        // Kiểm tra xem ký tự cuối cùng của key có phải là giá trị số không

        if (is_numeric($lastKey) || is_numeric($lastTwoCharacters)) {
            // Sử dụng truy vấn có tham số để ngăn chặn SQL injection
            $stmtFetchGrammar = $conn->prepare("SELECT * FROM grammar WHERE grammar_access = :lastKey OR grammar_access = :lastTwoCharacters");
            $stmtFetchGrammar->bindParam(":lastKey", $lastKey, PDO::PARAM_STR);
            $stmtFetchGrammar->bindParam(":lastTwoCharacters", $lastTwoCharacters, PDO::PARAM_STR);
            $stmtFetchGrammar->execute();

            $resultFetchGrammar = $stmtFetchGrammar->fetchAll(PDO::FETCH_ASSOC);

            if ($resultFetchGrammar) {
                foreach ($resultFetchGrammar as $rowFetchGrammar) {
                }
            } else {
                echo "Không có dữ liệu được tìm thấy.";
            }
        }
    }
} catch (PDOException $e) {
    echo "Kết nối không thành công: " . $e->getMessage();
} finally {
    // Đóng kết nối CSDL
    $conn = null;
}
?>

<main class="mt-2 container" id="index_home_page">
    <?php if ($rowFetchOne) { ?>
        <h1>
            Bài 
            <?php 
                echo $rowFetchOne['eng_id']; 
                echo ": ";
                echo $rowFetchOne['eng_course_topic']; 
                echo "<hr>";
            ?>
        </h1>
        <h4 class="mb-3">
            Điểm Ngữ Pháp:
            <?php echo "<br>" ?>
        </h4>
        <?php foreach($resultFetchGrammar as $rowFetchGrammar): ?>
            <?php 
                echo "<div class=''>";
                echo "<h5>";
                echo $rowFetchGrammar['grammar_name'];
                echo "</h5>"; 
                echo $rowFetchGrammar['grammar_structure'];
                echo "<br>";
                echo "Ví dụ: ";
                echo $rowFetchGrammar['grammar_example'];
                echo "<br>";
                echo  "</div>";
            ?>
        <?php endforeach; ?>
        <h4 class="mb-3">
            Trọng điểm bài học này: 
            <h6>
                <?php echo $rowFetchOne['eng_course_info']; ?>
            </h6>
        </h4>
    <?php } else {
        echo "Không có dữ liệu.";
    } ?>

    <div class="text-center mt-5 mb-5">
        <h2>Từ vựng bài này</h2>
    </div>
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Tiếng Anh</th>
                <th scope="col">Tiếng Việt</th>
                <th scope="col">Ví Dụ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultFetchOneVocab as $rowFetchOneVocab): ?>
                <tr>
                    <td><?php echo $rowFetchOneVocab['evocab_tieng_anh']; ?></td>
                    <td><?php echo $rowFetchOneVocab['evocab_tieng_viet']; ?></td>
                    <td><?php echo $rowFetchOneVocab['evocab_example']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
                        