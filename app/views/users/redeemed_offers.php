<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Redeemed Offers</title>

    <style>

        body { 
            font-family: "Segoe UI", Arial, sans-serif;
            margin: 0; padding: 0;

            background: linear-gradient(135deg, #0d47a1, #1565c0, #1e88e5);
            background-size: 400% 400%;
            animation: bgFlow 14s ease infinite;

            min-height: 100vh;

            padding: 30px;
            color: #fff;
        }


        .back-btn {
            display: inline-block;
            background: rgba(255,255,255,0.18);
            color: #fff;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            backdrop-filter: blur(4px);

            box-shadow: 0 4px 14px rgba(0,0,0,0.25);
            transition: 0.25s ease-in-out;
        }

        .back-btn:hover {
            background: rgba(255,255,255,0.30);
            transform: translateY(-3px);
        }


        h2 {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;

            font-size: 32px;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 3px 10px rgba(0,0,0,0.3);
        }


        .container {
            width: 90%;
            max-width: 650px;
            margin: 20px auto;
        }


        .offer-card {
            background: rgba(255,255,255,0.85);
            padding: 18px;
            margin-bottom: 16px;

            border-radius: 14px;
            border-left: 6px solid #28a745;

            box-shadow: 
                0 10px 25px rgba(0,0,0,0.25),
                0 4px 10px rgba(0,0,0,0.10);

            backdrop-filter: blur(6px);

            animation: fadeUp 0.7s ease;
        }



        .offer-card h3 {
            margin: 0;
            color: #0d47a1;
            font-size: 20px;
        }

        .offer-card p {
            color: #333;
        }

        .date {
            font-size: 13px;
            color: #555;
            margin-top: 6px;
        }


        .no-offers {
            text-align: center;
            margin-top: 40px;
            font-size: 20px;
            color: #eef2ff;
            text-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

    </style>
</head>

<body>

<a class="back-btn" href="/loyalty-program/public/customer/dashboard">← Customer Panel</a>

<h2>Your Redeemed Offers</h2>

<div class="container">

    <?php if (empty($offers)): ?>
        <p class="no-offers">You have not redeemed any offers yet.</p>
    <?php else: ?>
        <?php foreach ($offers as $offer): ?>
            <div class="offer-card">
                <h3><?= htmlspecialchars($offer['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars($offer['description'])) ?></p>
                <p><strong>Discount:</strong> <?= htmlspecialchars($offer['discount_value']) ?></p>
                <p class="date">Redeemed at: <?= htmlspecialchars($offer['redeemed_at']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>

</body>
</html>
