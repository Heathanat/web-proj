function addToCart(product) {
  // Retrieve the existing cart from localStorage or initialize an empty array
  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Check if the product already exists in the cart
  const existingProduct = cart.find(item => item.id === product.id);
  if (existingProduct) {
    existingProduct.quantity += 1; // Increment quantity if product exists
  } else {
    product.quantity = 1; // Add quantity property for new product
    cart.push(product); // Add new product to the cart
  }

  // Save the updated cart back to localStorage
  localStorage.setItem('cart', JSON.stringify(cart));

  alert(`${product.name} has been added to your cart!`);
}

function filterProducts(category) {
  const products = document.querySelectorAll('.product');
  products.forEach(product => {
    if (category === 'all' || product.dataset.category === category) {
      product.style.display = 'block';
    } else {
      product.style.display = 'none';
    }
  });
}

function buyNow(product) {
  addToCart(product); // Add the product to the cart
  window.location.href = '../src/cart.php'; // Redirect to the cart page
}

function proceedToCheckout() {
  // Retrieve the cart from localStorage
  const cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Calculate total price and total quantity
  const totalPrice = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
  const totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);

  // Store checkout data in localStorage
  const checkoutData = {
    items: cart,
    totalPrice: totalPrice.toFixed(2),
    totalQuantity: totalQuantity
  };
  localStorage.setItem('checkoutData', JSON.stringify(checkoutData));

  // Redirect to the checkout page
  window.location.href = '../src/checkout.php';
}

// Attach event listener to the checkout button (if applicable)
document.addEventListener('DOMContentLoaded', () => {
  const checkoutBtn = document.getElementById('checkout-btn');
  if (checkoutBtn) {
    checkoutBtn.addEventListener('click', (event) => {
      event.preventDefault(); // Prevent default form submission
      proceedToCheckout();
    });
  }
});

// Show or hide the Back to Top button
window.addEventListener('scroll', function () {
  const backToTopButton = document.getElementById('backToTop');
  if (window.scrollY > 300) {
    backToTopButton.classList.add('show');
  } else {
    backToTopButton.classList.remove('show');
  }
});

// Scroll to the top of the page
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}