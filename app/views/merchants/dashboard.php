<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$merchant = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Merchant Dashboard</title>

<link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet">

<style>
    body {
        background: #f4f6f9;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .sidebar {
        height: 100vh;
        background: #0d1b2a; 
        color: white;
        padding: 20px;
    }

    .sidebar a {
        color: #cfd9e6;
        display: block;
        padding: 10px 0;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #ffffff;
        background: #007bff; 
        padding-left: 12px;
        border-radius: 6px;
    }

    .content {
        padding: 30px;
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    .card-box {
        padding: 20px;
        border-radius: 10px;
        background: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        margin-bottom: 20px;
        border-left: 6px solid #007bff; 
        transition: 0.3s;
    }

    .card-box:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

</style>
</head>

<body>

<div class="row g-0">

    <div class="col-3 sidebar">
        <h3>Merchant Panel</h3>
        <hr style="border-color:#cfd9e6">

        <a href="/loyalty-program/public/merchant/dashboard">🏠 Dashboard</a>
        <a href="/loyalty-program/public/merchant/profile">📝 Edit Profile</a>
        <a href="/loyalty-program/public/merchant/my-offers">📦 My Offers</a>
        <a href="/loyalty-program/public/merchant/offers/create">➕ Add Offers</a>
        <a href="/loyalty-program/public/merchant/offers/edit-list">✏ Update Offers</a>
        <a href="/loyalty-program/public/merchant/offers/delete-list">🗑 Delete Offers</a>
        <a href="/loyalty-program/public">🚪 Back to Home</a>

    </div>

    <div class="col-9 content">
        <h2>Welcome, <?= htmlspecialchars($merchant['name']) ?>!</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="card-box">
                    <h4>Your Email</h4>
                    <p><?= htmlspecialchars($merchant["email"]) ?></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-box">
                    <h4>Merchant ID</h4>
                    <p><?= $merchant["merchant_id"] ?></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-box">
                    <h4>Total Offers</h4>
                    <p><?= $offerCount ?? 0 ?></p>
                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>
