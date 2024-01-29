<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nln_hk2_2024";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT evocab_id, evocab_tieng_anh, evocab_tieng_viet, evocab_example, evocab_role, evocab_pronounce, evocab_accessmode, evocab_createtime 
            FROM vocab_eng";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h3 class="text-center">
  Lưu ý bài test này bao gồm nội dung từ vựng và ngữ pháp từ bài 1 đến bài 10
</h3>

<h4>
  EngLish Test
</h4>