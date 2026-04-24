<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Points</title>

<style>

    .back-btn {
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
    }

    .back-btn:hover {
        background: #0056b3;
    }

    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        font-family: "Segoe UI", Arial, sans-serif;

        background: linear-gradient(135deg, #0d47a1, #1976d2, #42a5f5);
        background-size: 300% 300%;
        animation: bgMove 10s infinite alternate ease-in-out;

        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }



    .points-box {
        width: 90%;
        max-width: 380px;
        padding: 35px;
        border-radius: 16px;

        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);

        box-shadow: 0 15px 35px rgba(0,0,0,0.25);
        text-align: center;

        animation: fadeIn 0.7s ease;
    }



    h1 {
        margin-top: 0;
        font-size: 32px;
        letter-spacing: 1px;
    }

    p {
        font-size: 18px;
        color: #e3f2fd;
        margin-bottom: 10px;
    }

    .points {
        font-size: 56px;
        font-weight: 800;
        color: #ffeb3b;
        text-shadow: 0 4px 12px rgba(0,0,0,0.4);
    }

</style>

</head>
<body>

<a class="back-btn" href="/loyalty-program/public/">← Back to Home</a>

<div class="points-box">
    <h1>My Points</h1>
    <p>Your current points</p>
    <div class="points"><?= $points ?></div>
</div>

</body>
</html>
