<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Offers</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

 
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

        h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 25px;
            color: #333;
        }

        .offers-container {
            width: 90%;
            max-width: 600px;
            margin: auto;
        }

        .offer-card {
            background: #fff;
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            border-left: 6px solid #dc3545;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .offer-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            color: #dc3545;
        }

        .description {
            margin: 10px 0;
            color: #444;
        }

        .discount {
            font-weight: bold;
            color: #28a745;
        }

        .delete-btn {
            display: inline-block;
            margin-top: 12px;
            padding: 10px 14px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 15px;
            transition: 0.3s;
        }

        .delete-btn:hover {
            background: #b02a37;
        }

        .empty {
            text-align: center;
            color: #777;
            font-size: 18px;
            margin-top: 30px;
        }
    </style>

</head>
<body>

<a class="back-top-btn" href="/loyalty-program/public/merchant/dashboard">← Merchant Panel</a>

<h2>Delete Offers</h2>

<div class="offers-container">

<?php if (empty($offers)): ?>

    <p class="empty">No offers available.</p>

<?php else: ?>

    <?php foreach ($offers as $offer): ?>
        <div class="offer-card">

            <div class="title"><?= htmlspecialchars($offer["title"]) ?></div>

            <div class="description">
                <?= nl2br(htmlspecialchars($offer["description"])) ?>
            </div>

            <div class="discount">
                Discount: <?= htmlspecialchars($offer["discount_value"]) ?>
            </div>

            <a class="delete-btn"
               href="/loyalty-program/public/merchant/offers/delete?id=<?= $offer['offer_id'] ?>">
               Delete
            </a>

        </div>
    <?php endforeach; ?>

<?php endif; ?>

</div>

</body>
</html>
