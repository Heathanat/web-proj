<!-- filepath: d:\Documents\Wampserver\www\Web-php\Ecom\EcomPhp\login.php -->
<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy credentials for demonstration
    $validUsername = 'admin';
    $validPassword = 'password123';

    if ($username === $validUsername && $password === $validPassword) {
        $_SESSION['user'] = $username;
        header('Location: index.php'); // Redirect to the homepage
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Sports</title>
  <link rel="stylesheet" href="../css/style.css" />
  <script src="../js/script.js"></script>
</head>
<body>
    <!-- Navbar -->
    <header>
        <h1>The Sports</h1>
        <nav>
            <ul>
                <li><a href="../src/index.php">Home</a></li>
                <li><a href="../src/shop.php">Shop</a></li>
                <li><a href="../src/cart.php">Cart</a></li>
                <li><a href="../src/checkout.php">Checkout</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php" class="active">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- Login Form -->
    <div class="login-container">
        <h2>Login</h2>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="checkout.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>

