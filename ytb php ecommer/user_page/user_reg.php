<?php
function generateRandomString($length) {
    $characters = '0123456789ABCDEF';
    $randomString = '#';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, 15)]; // Chọn một ký tự ngẫu nhiên từ 0 đến 15
    }

    return $randomString;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nln_hk2_2024";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['register'])) {
        $users_name = $_POST['users_name'];
        $users_email = $_POST['users_email'];
        $users_age = $_POST['users_age'];
        $users_gender = $_POST['users_gender'];
        $users_pwd = $_POST['users_pwd'];

        // Check if users_name already exists
        $checkQuery = $conn->prepare("SELECT COUNT(*) FROM users WHERE users_name = :users_name");
        $checkQuery->bindParam(':users_name', $users_name);
        $checkQuery->execute();
        $count = $checkQuery->fetchColumn();

        if ($count > 0) {
          echo '<div id="customAlert" 
                     class="alert alert-danger alert-dismissible fade show text-center d-flex align-items-center justify-content-center" 
                     role="alert" 
                     style="width: 29vw; position: fixed;
                            top: 35%; 
                            left: 50%; 
                            transform: translate(-50%, -50%); 
                            width: 29vw;
                ">
                  Username already exists. Please choose another one.
                </div>';
        } else {
            // Using prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO users(users_id, users_name, users_email, users_age, users_gender, users_pwd) 
                                   VALUES (:users_id, :users_name, :users_email, :users_age, :users_gender, :users_pwd)");

            $users_id = generateRandomString(5);
            $stmt->bindParam(':users_id', $users_id);
            $stmt->bindParam(':users_name', $users_name);
            $stmt->bindParam(':users_email', $users_email);
            $stmt->bindParam(':users_age', $users_age);
            $stmt->bindParam(':users_gender', $users_gender);
            $stmt->bindParam(':users_pwd', $users_pwd);

            if ($stmt->execute()) {
              echo '<div id="customAlert" 
                         class="alert alert-success alert-dismissible fade show text-center d-flex align-items-center justify-content-center" 
                         role="alert"
                         style="width: 29vw; position: fixed;
                                top: 35%; 
                                left: 50%; 
                                transform: translate(-50%, -50%); 
                                width: 29vw;"
                    >
                      Register Successfully!!
                    </div>';
  
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>
