<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Offers</title>

<style>


body {
    font-family: "Segoe UI", Arial, sans-serif;
    margin: 0;
    padding: 40px 20px;

    background: linear-gradient(135deg, #0d47a1, #1565c0, #1e88e5);
    background-size: 400% 400%;
    animation: moveBG 14s ease infinite;

    min-height: 100vh;
    color: white;
}


.back-top {
    position: absolute;
    top: 20px;
    left: 20px;
}

.btn-blue {
    display: inline-block;
    background: rgba(255,255,255,0.25);
    color: #fff;
    padding: 10px 18px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
    backdrop-filter: blur(5px);
    box-shadow: 0 4px 14px rgba(0,0,0,0.25);
    transition: 0.25s;
}

.btn-blue:hover {
    background: rgba(255,255,255,0.35);
    transform: translateY(-3px);
}


h2 {
    text-align: center;
    color: white;
    margin-top: 60px;
    font-size: 32px;
    font-weight: 700;
    text-shadow: 0 3px 10px rgba(0,0,0,0.3);
}


.offers-grid {
    max-width: 1000px;
    margin: 30px auto;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 25px;
}


.offer-card {
    background: rgba(255,255,255,0.90);
    padding: 18px;
    border-radius: 16px;

    box-shadow:
        0 10px 25px rgba(0,0,0,0.25),
        0 4px 10px rgba(0,0,0,0.1);
    backdrop-filter: blur(5px);

    color: #222;
    animation: fadeUp 0.7s ease;
}


.offer-card h3 {
    margin: 0;
    color: #0d47a1;
    font-size: 20px;
    font-weight: 700;
}

.offer-card p {
    margin: 6px 0;
    font-size: 14px;
    color: #444;
}


.redeem-btn {
    display: inline-block;
    padding: 10px 16px;
    background: linear-gradient(90deg, #28a745, #43c067);
    color: white;
    text-decoration: none;
    border-radius: 10px;
    margin-top: 12px;
    font-weight: 600;

    transition: 0.25s;
    box-shadow: 0 6px 14px rgba(40,167,69,0.35);
}

.redeem-btn:hover {
    background: linear-gradient(90deg, #43c067, #52d67a);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(40,167,69,0.45);
}


.back-bottom {
    text-align: center;
    margin-top: 40px;
}

</style>

</head>
<body>

<div class="back-top">
    <a href="/loyalty-program/public/customer/dashboard" class="btn-blue">← Customer Panel</a>
</div>

<h2>All Available Offers</h2>

<div class="offers-grid">
    <?php if (empty($offers)): ?>
        <p style="text-align:center; width:100%;">No offers available.</p>
    <?php else: ?>
        <?php foreach ($offers as $offer): ?>
            <div class="offer-card">
                <h3><?= htmlspecialchars($offer['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars($offer['description'])) ?></p>
                <p><strong>Discount:</strong> <?= htmlspecialchars($offer['discount_value']) ?></p>

                <?php if ($isCustomer): ?>
                    <a class="redeem-btn"
                       href="/loyalty-program/public/customer/redeem-offer?id=<?= $offer['offer_id'] ?>">
                        Use Offer
                    </a>
                <?php else: ?>
                    <a class="redeem-btn" href="/loyalty-program/public/login">
                        Login to Use Offer
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<div class="back-bottom">
        <a href="/loyalty-program/public/" class="btn-blue">← Back to Home</a>

</div>

</body>
</html>
