<?php
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['user']) || ($_SESSION['role'] ?? null) !== 'merchant') {
    header("Location: /loyalty-program/public/login");
    exit;
}

$offers = $offers ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Offers</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>

    .back-top-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        background: #007bff;
        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        transition: 0.3s;
        z-index: 999;
    }
    .back-top-btn:hover {
        background: #0056b3;
    }

    body {
        background:#f4f6f9;
        padding:30px;
        font-family: Arial, sans-serif;
        margin: 0;
    }

    h2 {
        text-align:center;
        color:#333;
        margin-bottom:30px;
        font-size:28px;
    }

    .container-box {
        width: 90%;
        max-width: 700px;
        margin: auto;
    }

    .offer-card {
        background:white;
        padding:20px;
        border-radius:12px;
        box-shadow:0 4px 12px rgba(0,0,0,0.1);
        border-left:6px solid #007bff;
        margin-bottom:20px;
        transition:0.3s;
    }

    .offer-card:hover {
        transform: scale(1.02);
        box-shadow:0 6px 16px rgba(0,0,0,0.15);
    }

    .offer-card h4 {
        color:#007bff;
        margin-bottom:10px;
    }

    .offer-card strong {
        color:#28a745;
    }

    .back-btn {
        display: inline-block;
        margin-top: 25px;
        text-align: center;
        width: 100%;
        font-size: 18px;
        text-decoration:none;
        color:#6f42c1;
        transition:0.3s;
    }

    .back-btn:hover {
        text-decoration:underline;
    }
</style>

</head>

<body>

<a class="back-top-btn" href="/loyalty-program/public/merchant/dashboard">← Merchant Panel</a>

<h2>My Offers</h2>

<div class="container-box">

    <?php if (empty($offers)): ?>
        <p style="font-size:18px; color:#777; text-align:center;">
            You have not added any offers yet.
        </p>
    <?php endif; ?>

    <?php foreach ($offers as $offer): ?>
        <div class="offer-card">
            <h4><?= htmlspecialchars($offer['title']) ?></h4>
            <p><?= nl2br(htmlspecialchars($offer['description'])) ?></p>
            <strong>Discount: <?= htmlspecialchars($offer['discount_value']) ?></strong>
        </div>
    <?php endforeach; ?>

</div>

</body>
</html>
