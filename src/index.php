<?php
// Example PHP code (can be removed if not needed)
echo "<!-- PHP Loaded Successfully -->";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Sports</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/style.css" />
  <script src="../js/script.js"></script>
  <script src="../js/cart.js"></script>
</head>
  <body>
    <!-- Header -->
    <header>
      <h1>The Sports</h1>
      <nav>
        <ul>
          <li><a href="../src/index.php" class="active">Home</a></li>
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
    </header>

          <!-- Bootstrap Slideshow -->
<section class="slideshow">
  <div id="productCarousel" class="carousel slide mx-auto" data-bs-ride="carousel" style="max-width: 600px;">
    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <img src="../image/jersey1.webp" class="d-block w-100" alt="Jersey 1">
        <div class="carousel-caption d-none d-md-block">
          <a href="../src/shop.php" class="btn btn-primary">Shop Now</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <img src="../image/4.png" class="d-block w-100" alt="Shoe 1">
        <div class="carousel-caption d-none d-md-block">
          <a href="../src/shop.php" class="btn btn-primary">Shop Now</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <img src="../image/bag3.webp" class="d-block w-100" alt="Bag 1">
        <div class="carousel-caption d-none d-md-block ">
          <a href="../src/shop.php" class="btn btn-primary">Shop Now</a>
        </div>
      </div>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
    
    <!-- Main -->
    <main>
      <!-- Featured Categories -->
      <section class="home-categories">
        <h2>Explore Our Categories</h2>
        <div class="category-grid">
          <div class="category-card">
            <img src="../image/jersey1.webp" alt="Jersey" />
            <h3>Jerseys</h3>
            <a href="../src/shop.php" class="btn">Shop Jerseys</a>
          </div>
          <div class="category-card">
            <img src="../image/4.png" alt="Accessories" />
            <h3>Shoes</h3>
            <a href="../src/shop.php" class="btn">Shop Shoes</a>
          </div>
          <div class="category-card">
            <img src="../image/bag.webp" alt="Bags" />
            <h3>Bags</h3>
            <a href="../src/shop.php" class="btn">Shop Bags</a>
          </div>
        </div>
      </section>

      <section class="home-categories">
        <h2>Lastest Feature Catogories</h2>
        <div class="category-grid">
          <div class="category-card">
            <img src="../image/jersey3.webp" alt="Accessories" />
            <h3>Jersey</h3>
            <a href="../src/shop.php" class="btn">Shop Shoes</a>
          </div>
          <div class="category-card">
            <img src="../image/2." alt="Jersey" />
            <h3>Jerseys</h3>
            <a href="../src/shop.php" class="btn">Shop Jerseys</a>
          </div>
          <div class="category-card">
            <img src="../image/bag3.webp" alt="Bags" />
            <h3>Bags</h3>
            <a href="../srcshop.php" class="btn">Shop Bags</a>
          </div>
        </div>
      </section>
      
    </main>

    <!-- Back to Top Button -->
    <?php include 'back-to-top.php'; ?>

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
          <p>Email: supporthesports.com</p>
          <p>Phone: +123 456 7890</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> The Sports. All rights reserved.</p>
      </div>
    </footer>
  </body>
</html>
