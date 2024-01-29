<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flashcard";
$user = null;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submitted'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users 
                                         WHERE username = :username 
                                         AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); 
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Lưu thông tin người dùng vào session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];

            echo '<div id="customAlert" 
                        class="alert alert-success alert-dismissible fade show text-center d-flex align-items-center justify-content-center" 
                        role="alert"
                        style="width: 29vw; position: fixed;
                              top: 35%; 
                              left: 50%; 
                              transform: translate(-50%, -50%); 
                              width: 29vw;"
                  >
                    Login Successfully!!!
                  </div>';
                  
        } else {
            echo '<div id="customAlert" 
                        class="alert alert-danger alert-dismissible fade show text-center d-flex align-items-center justify-content-center" 
                        role="alert" 
                        style="width: 29vw; position: fixed;
                              top: 35%; 
                              left: 50%; 
                              transform: translate(-50%, -50%); 
                              width: 29vw;
                  ">
                    Invalid username or password
                  </div>';
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if ($user) {
  $_SESSION['user_id'] = $user['user_id'];
  $_SESSION['username'] = $user['username'];
  $_SESSION['password'] = $user['password'];
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Log In</a>
    <a class="dropdown-item" href="check2.php">check2</a>
    <a class="dropdown-item" href="check3.php">check3</a>
    <?php
                  if (isset($_SESSION['user_id'])) {
                      echo "
                            {$_SESSION['username']}
                            {$_SESSION['user_id']}
                          ";
                  } else {
                      echo "Hi User";
                  }
                  ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="check1.php" method="post">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" id="form2Example1" name="username" class="form-control" required />
                <label class="form-label" for="form2Example1">UserName</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form2Example2" name="password" class="form-control" required />
                <label class="form-label" for="form2Example2">Password</label>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name = "submitted" class="btn btn-primary">Log In</button>
          </div>
          </form>
        </div>
      </div>
    </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
