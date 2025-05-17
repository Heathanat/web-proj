<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cart - The Sports</title>
  <link rel="stylesheet" href="../css/style.css" />
  <script src="../js/cart.js"></script>
  <script src="../js/script.js"></script>
  <script src="../js/jquery.min.js"></script>
</head>
<body>
  <header>
    <h1>The Sports</h1>
    <nav>
      <ul>
        <li><a href="../src/index.php">Home</a></li>
        <li><a href="../src/shop.php">Shop</a></li>
        <li><a href="../src/cart.php" class="active">Cart</a></li>
        <li><a href="../src/checkout.php">Checkout</a></li>
        <?php if (isset($_SESSION['user'])): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <main>
    <section class="cart">
      <div class="cart-container">
        <h1>Your Cart</h1>
        <div id="cart-items">
          <!-- Cart items will be dynamically loaded here -->
        </div>
        <div id="cart-total">
          <!-- Total price and quantity will be dynamically calculated here -->
        </div>

        <!-- Checkout Form -->
        <form method="POST" action="../src/checkout.php" id="checkout-form">
          <input type="hidden" id="total_price" name="total_price" value="">
          <input type="hidden" id="total_quantity" name="total_quantity" value="">
          <button type="submit" id="checkout-btn">Checkout</button>
          <button type="button" id="cancel-cart-btn">Cancel Cart</button>
        </form>
      </div>
    </section>
  </main>

  <footer>
    <div class="footer-content">
      <div class="footer-section about">
        <h3>About Us</h3>
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
    // Define an array to store cart items
    const CART_ITEMS = [];

    // Function to add items to the cart
    function addToCart(item) {
      const existingItem = CART_ITEMS.find(cartItem => cartItem.id === item.id);
      if (existingItem) {
        existingItem.quantity += 1; // Increment quantity if item already exists
      } else {
        item.quantity = 1; // Set initial quantity
        CART_ITEMS.push(item);
      }
      alert(`${item.name} added to cart!`);
    }

    // Function to handle "Buy Now" button
    function buyNow(item) {
      CART_ITEMS.length = 0; // Clear the cart
      item.quantity = 1; // Set quantity to 1
      CART_ITEMS.push(item); // Add the selected item
      proceedToCheckout(); // Redirect to checkout
    }

    // Function to proceed to checkout
    function proceedToCheckout() {
      // Calculate total price and total quantity
      const totalPrice = CART_ITEMS.reduce((sum, item) => sum + item.price * item.quantity, 0);
      const totalQuantity = CART_ITEMS.reduce((sum, item) => sum + item.quantity, 0);

      // Update hidden form inputs
      document.getElementById('total_price').value = totalPrice.toFixed(2);
      document.getElementById('total_quantity').value = totalQuantity;

      // Store cart data in localStorage
      const checkoutData = {
        items: CART_ITEMS,
        totalPrice: totalPrice.toFixed(2),
        totalQuantity: totalQuantity
      };
      localStorage.setItem('checkoutData', JSON.stringify(checkoutData));

      // Submit the form to redirect to the checkout page
      document.getElementById('checkout-form').submit();
    }

    // Function to cancel the cart
    function cancelCart() {
      CART_ITEMS.length = 0; // Clear the cart
      localStorage.removeItem('checkoutData'); // Clear localStorage
      alert('Cart has been cleared!');
      location.reload(); // Reload the page
    }

    // Attach event listeners
    document.addEventListener('DOMContentLoaded', () => {
      const checkoutBtn = document.getElementById('checkout-btn');
      const cancelCartBtn = document.getElementById('cancel-cart-btn');

      if (checkoutBtn) {
        checkoutBtn.addEventListener('click', (event) => {
          event.preventDefault(); // Prevent default form submission
          proceedToCheckout();
        });
      }

      if (cancelCartBtn) {
        cancelCartBtn.addEventListener('click', (event) => {
          event.preventDefault(); // Prevent default button action
          cancelCart();
        });
      }
    });
  </script>
</body>
</html>