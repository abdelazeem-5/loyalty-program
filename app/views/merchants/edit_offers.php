<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Offers</title>

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
            color: #333;
            margin-bottom: 20px;
        }

        h3 {
            color: #007bff;
            margin-top: 30px;
            font-size: 22px;
        }

        form {
            width: 90%;
            max-width: 450px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        form label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0 18px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            transition: 0.3s;
        }

        input:focus, textarea:focus {
            border-color: #007bff;
            background: #e9f2ff;
            outline: none;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
        }

        textarea {
            height: 130px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #0056b3;
        }

        .offer-list {
            width: 90%;
            max-width: 600px;
            margin: 30px auto;
            padding: 0;
            list-style: none;
        }

        .offer-card {
            background: #fff;
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            border-left: 6px solid #007bff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .offer-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        }

        .offer-title {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
        }

        .offer-desc {
            margin: 8px 0;
            color: #444;
        }

        .offer-discount {
            color: #28a745;
            font-weight: bold;
        }

        .edit-link {
            display: inline-block;
            margin-top: 10px;
            background: #ffc107;
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
            color: black;
            font-size: 15px;
            transition: 0.3s;
        }

        .edit-link:hover {
            background: #e0a800;
        }

        .empty-msg {
            text-align: center;
            font-size: 18px;
            color: #777;
        }
    </style>
</head>

<body>

<a class="back-top-btn" href="/loyalty-program/public/merchant/dashboard">← Merchant Panel</a>

<h2>Edit Offers</h2>

<?php
if (isset($offer)):
?>

    <h3>Edit Offer: <?= htmlspecialchars($offer['title']) ?></h3>

    <form action="/loyalty-program/public/merchant/offers/edit?id=<?= $offer['offer_id'] ?>" method="POST">

        <label>Title:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($offer['title']) ?>" required>

        <label>Description:</label>
        <textarea name="description" required><?= htmlspecialchars($offer['description']) ?></textarea>

        <label>Discount:</label>
        <input type="text" name="discount_value" value="<?= htmlspecialchars($offer['discount_value']) ?>" required>

        <button type="submit">Save Changes</button>
    </form>

<?php endif; ?>

<?php if (empty($offers)): ?>

    <p class="empty-msg">No offers available.</p>

<?php else: ?>

    <ul class="offer-list">

        <?php foreach ($offers as $offerItem): ?>
            <li class="offer-card">

                <div class="offer-title"><?= htmlspecialchars($offerItem["title"]) ?></div>

                <div class="offer-desc">
                    <?= nl2br(htmlspecialchars($offerItem["description"])) ?>
                </div>

                <div class="offer-discount">
                    Discount: <?= htmlspecialchars($offerItem["discount_value"]) ?>
                </div>

                <a class="edit-link" href="/loyalty-program/public/merchant/offers/edit?id=<?= $offerItem['offer_id'] ?>">
                    Edit
                </a>

            </li>
        <?php endforeach; ?>

    </ul>

<?php endif; ?>

</body>
</html>
