<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="/loyalty-program/public/css/stylee.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <title>Loyalty Program</title>
</head>

<body>

<header>
  <div class="header-container">
    <div class="header-col">
      <div class="logo-container">
        <a href="/loyalty-program/public/">
          <img src="/loyalty-program/public/images/logoo2.jpeg" alt="logo" class="logo">
        </a>
      </div>
    </div>

    <div class="header-col">
      <nav class="nav-container">
          <ul class="nav-list-container">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="/loyalty-program/public/customer/points">EarnPoints</a></li>
            <li><a href="/loyalty-program/public/customer/redeemed-offers">Redeem</a></li>
            <li><a href="/loyalty-program/public/offers">Offers</a></li>
            <li><a href="/loyalty-program/public/subscription/join">subscriptions</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>


      </nav>
    </div>

    <div class="header-col">



      <ul class="button">

<?php if (isset($_SESSION['user'])): ?>

    <li>
        <span class="btn" style="background:transparent;color:#93c5fd;cursor:default;">
            <?= htmlspecialchars($_SESSION['user']['name']) ?>
        </span>
    </li>

    <?php if ($_SESSION['role'] === 'customer'): ?>
        <li>
            <a href="/loyalty-program/public/customer/dashboard" class="btn">
                Dashboard
            </a>
        </li>

    <?php elseif ($_SESSION['role'] === 'merchant'): ?>
        <li>
            <a href="/loyalty-program/public/merchant/dashboard" class="btn">
                Dashboard
            </a>
        </li>

    <?php elseif ($_SESSION['role'] === 'admin'): ?>
        <li>
            <a href="/loyalty-program/public/admin/dashboard" class="btn">
                Admin Panel
            </a>
        </li>
    <?php endif; ?>

    <li>
        <a href="/loyalty-program/public/logout" class="btn">
            Logout
        </a>
    </li>

<?php else: ?>

    <li>
        <a href="/loyalty-program/public/login" class="btn">Login</a>
    </li>
    <li>
        <a href="/loyalty-program/public/select-user-type" class="btn">Register</a>
    </li>

<?php endif; ?>

</ul>


    </div>
  </div>


</header>

  <section id="home" class="hero">
  <div class="hero-content">
    <h1>Earn Rewards Every Time You Shop</h1>
    <p>
      Join our loyalty program and earn points with every purchase.
      Redeem your points for exclusive rewards and special offers.
    </p>
  </div>
</section>

<section id="about" class="about-section">

  <div class="container">
    <h2 class="section-title">About Loyalty</h2>
    <p class="section-desc">
      Loyalty is a platform for managing loyalty programs that serve both users and merchants.
      It offers a variety of programs to fit different needs.
    </p>

    <div class="cards">
      <div class="card card-tiered">
        <div class="icon">⭐</div>
        <h3>Tiered Programs</h3>
        <p>Benefits are divided into levels (Silver, Gold, Platinum).</p>
      </div>

      <div class="card card-subscription">
        <div class="icon">💳</div>
        <h3>Subscription-Based</h3>
        <p>Customers pay a monthly or yearly subscription.</p>
      </div>

      <div class="card card-value">
        <div class="icon">🌿</div>
        <h3>Value-Based</h3>
        <p>Programs focused on shared values.</p>
      </div>

      <div class="card card-points">
        <div class="icon">🎁</div>
        <h3>Points-Based</h3>
        <p>Earn points and redeem rewards.</p>
      </div>
    </div>
  </div>
</section>

<section class="categories">
  <div class="container">
    <h2 class="section-title">Supported Categories</h2>

    <div class="category-grid">
      <div class="category-card">
        <img src="/loyalty-program/public/images/mall.jpeg" alt="Shopping Malls">
        <h3>Shopping Malls</h3>
      </div>

      <div class="category-card">
        <img src="/loyalty-program/public/images/restaurant.jpeg" alt="Restaurants">
        <h3>Restaurants</h3>
      </div>

      <div class="category-card">
        <img src="/loyalty-program/public/images/cinema.jpeg" alt="Cinemas">
        <h3>Cinemas</h3>
      </div>

      <div class="category-card">
        <img src="/loyalty-program/public/images/Entertainment.jpeg" alt="Entertainment">
        <h3>Entertainments</h3>
      </div>

      <div class="category-card">
        <img src="/loyalty-program/public/images/hotel.jpeg" alt="Hotels">
        <h3>Hotels</h3>
      </div>
    </div>
  </div>
</section>

<section class="users">
  <div class="container users-grid">
    <div class="user-box">
      <div class="icon">
        <i class="fas fa-user fa-3x" style="color:#fbbf24;"></i>
      </div>
      <h3>For Users</h3>
      <p>Track points and enjoy exclusive rewards.</p>
    </div>

    <div class="user-box">
      <div class="icon">
        <i class="fas fa-store fa-3x" style="color:#fbbf24;"></i>
      </div>
      <h3>For Merchants</h3>
      <p>Create programs and engage customers.</p>
    </div>
  </div>
</section>

<footer class="footer" id="contact">
  <div class="footer-container">
    <div class="footer-section">
      <h3>Loyalty Web App</h3>
      <p>Connecting customers with rewards and offers.</p>
    </div>

    <div class="footer-section">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="/loyalty-program/public/">Home</a></li>
        <li><a href="/loyalty-program/public/offers">Offers</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h4>Contact Us</h4>
      <p>Email: support@loyaltyapp.com</p>
      <p>Phone: +20 123 456 7890</p>
    </div>
  </div>

  <p class="footer-bottom">
    Loyalty Web App. All Rights Reserved.
    created by abdelazeem
  </p>
</footer>

</body>
</html>
//