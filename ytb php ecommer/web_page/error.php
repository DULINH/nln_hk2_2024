<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Not Found</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .index_home_page {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .error-container {
            text-align: center;
        }

        .error-code {
            font-size: 10rem;
            font-weight: bold;
            color: #dc3545;
        }

        .error-message {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .back-home-link {
            text-decoration: none;
            font-size: 1.2rem;
            color: #007bff;
        }
    </style>
</head>
<body>
<main class="mt-2 container" id="index_home_page">
<div class="error-container">
    <div class="error-code">404</div>
    <div class="error-message">Not Found</div>
    <p>Sorry, the page you are looking for might be in another castle or invalid username and password.</p>
    <a href="./index.php" class="back-home-link">Back to Home</a>
</div>
</main>

<!-- Bootstrap JS and Popper.js (optional, for Bootstrap components that require JavaScript) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
