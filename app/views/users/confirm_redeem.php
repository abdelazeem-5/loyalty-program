<?php
if (!isset($_SESSION["user"])) {
    header("Location: /loyalty-program/public/login");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Confirm Offer</title>

<style>

body {
    margin: 0;
    font-family: "Segoe UI", Arial, sans-serif;

    background: linear-gradient(135deg, #0d47a1, #1565c0, #1e88e5);
    background-size: 400% 400%;
    animation: bgMove 13s ease infinite;

    min-height: 100vh;
    padding-top: 80px;
}


.box {
    width: 90%;
    max-width: 450px;

    background: rgba(255,255,255,0.92);
    padding: 30px;
    margin: auto;

    border-radius: 20px;
    backdrop-filter: blur(8px);

    box-shadow:
        0 12px 28px rgba(0,0,0,0.25),
        0 4px 10px rgba(0,0,0,0.12);

    text-align: center;

    animation: fadeUp 0.7s ease;
}



.box h2 {
    margin: 0 0 15px;
    color: #0d47a1;
    font-size: 26px;
    font-weight: 700;
}


.box p {
    font-size: 16px;
    color: #333;
    margin: 8px 0;
}


.btn-confirm {
    background: linear-gradient(90deg, #28a745, #43c067);
    color: white;

    padding: 14px 28px;
    font-size: 18px;
    font-weight: 700;

    border: none;
    border-radius: 12px;
    cursor: pointer;

    box-shadow: 0 8px 20px rgba(40,167,69,0.35);
    transition: 0.25s;
    width: 100%;
    margin-top: 15px;
}

.btn-confirm:hover {
    background: linear-gradient(90deg, #43c067, #52d67a);
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(40,167,69,0.45);
}


.btn-back {
    display: block;
    margin-top: 18px;
    color: #e0e8ff;
    text-decoration: none;
    font-size: 17px;
    font-weight: 600;

    transition: 0.25s;
}

.btn-back:hover {
    color: #fff;
    transform: translateX(-4px);
}

</style>
</head>

<body>

<div class="box">

    <h2>Confirm Using Offer</h2>

    <p><b>Offer:</b> <?= htmlspecialchars($offer["title"]) ?></p>
    <p><?= nl2br(htmlspecialchars($offer["description"])) ?></p>
    <p><b>Final Discount:</b> <?= $offer["final_discount"] ?>%</p>

    <form action="/loyalty-program/public/customer/confirm-redeem" method="POST">
        <input type="hidden" name="offer_id" value="<?= $offer["offer_id"] ?>">
        <button class="btn-confirm">Confirm Use</button>
    </form>

    <a href="/loyalty-program/public/offers" class="btn-back">← Back to Offers</a>

</div>

</body>
</html>
