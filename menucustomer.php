<?php
// Periksa apakah sesi sudah dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah user sudah login
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Customer</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #333;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
        }

        .hero-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }

        .hero-section img {
            width: 100%;
            max-width: 400px;
            margin: 0 15px;
        }

        .footer {
            background-color: #1a1a1a;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .footer a {
            color: #f8f9fa;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="menucustomer.php">HAVERS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="menucustomer.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dmobil.php">Mobil</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="drental.php">Transaksi</a></li>
                <li class="nav-item"><a class="nav-link" href="dpengembalian.php">Pengembalian</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                <li class="nav-item">
                    <?php if ($username): ?>
                        <a class="nav-link" href="logout.php">Logout (<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>)</a>
                    <?php else: ?>
                        <a class="nav-link" href="login.php">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <img src="img/avanza.png" alt="Toyota Avanza">
        <img src="img/grandmax.png" alt="Daihatsu Gran Maxa">
        <img src="img/logo.png" alt="Toyota Innova">
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>COPYRIGHT © 2025 P.T HAVERS JAYA SENTOSA | DESIGN BY: <a href="#">HASVI ARYGUNA</a></p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
