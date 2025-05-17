<!-- filepath: d:\Documents\wamp64\www\Web-php\EcomPhp\checkout.php -->
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Web";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle checkout form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {
    $user_id = intval($_POST['user_id']);
    $total_amount = floatval($_POST['total_amount']);

    // Insert order into the orders table
    $sql = "INSERT INTO orders (user_id, total_amount, order_date) VALUES ('$user_id', '$total_amount', NOW())";

    if ($conn->query($sql) === TRUE) {
        $order_id = $conn->insert_id;

        // Move cart items to order_items table
        $cart_items = $conn->query("SELECT * FROM cart WHERE user_id = '$user_id'");
        while ($item = $cart_items->fetch_assoc()) {
            $product_id = $item['product_id'];
            $quantity = $item['quantity'];
            $conn->query("INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')");
        }

        // Clear the cart
        $conn->query("DELETE FROM cart WHERE user_id = '$user_id'");

        echo "<script>alert('Checkout successful!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Pre-fill total price and quantity from the cart page
$total_price = isset($_POST['total_price']) ? floatval($_POST['total_price']) : 0;
$total_quantity = isset($_POST['total_quantity']) ? intval($_POST['total_quantity']) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout - The Sports</title>
  <link rel="stylesheet" href="../css/style.css" />
  <script src="../js/cart.js"></script>
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
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header><br><br>

    <!-- Checkout Form -->
    <div class="checkout-container">
        <h1>Checkout</h1>
        <form method="POST" action="../src/checkout.php">
            <!-- <input type="number" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" readonly><br><br> -->

            <label for="total_amount">Total Amount:</label>
            <input type="number" step="0.01" id="total_amount" name="total_amount" value="<?php echo $total_price; ?>" readonly><br><br>

            <label for="total_quantity">Total Quantity:</label>
            <input type="number" id="total_quantity" name="total_quantity" value="<?php echo $total_quantity; ?>" readonly><br><br>

            <button type="submit" name="checkout" class="checkout-btn">Checkout</button>
        </form>
    </div><>

    <!-- Footer -->
    <footer>
      <div class="footer-content">
        <div class="footer-section about">
          <h3>About Us </h3>
          <p>The Sports is your go-to store for trendy and affordable products.<br>
          We are committed to providing you with the best shopping experience possible.</p>
          This page design by Menghor and ThaNat.<br>
          </p>
        </div>
        <div class="footer-section links">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="../src/index.php">Home</a></li>
            <li><a href="../src/shop.php">Shop</a></li>
            <li><a href="../src/cart.php">Cart</a></li>
            <li><a href="../src/checkout.php">Checkout</a></li>
            <li><a href="../src/login.php">Login</a></li>
          </ul>
        </div>
        <div class="footer-section contact">
          <h3>Contact Us</h3>
          <p>Email: supportThesports.com</p>
          <p>Phone: +123 456 7890</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> The Sports. All rights reserved.</p>
      </div>
    </footer>

    <script>
  document.addEventListener('DOMContentLoaded', () => {
    const checkoutData = JSON.parse(localStorage.getItem('checkoutData'));
    if (checkoutData) {
      console.log('Checkout Data:', checkoutData);
      // Use this data to display or process the order
    }
  });
</script>
</body>
</html>