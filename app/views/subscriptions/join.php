<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Subscription</title>

<style>

    body {
        font-family: "Segoe UI", Arial, sans-serif;
        margin: 0;
        padding: 0;
        height: 100vh;

        display: flex;
        flex-direction: column;
        align-items: center;

        background: linear-gradient(135deg, #0d47a1, #1565c0, #1e88e5, #42a5f5);
        background-size: 400% 400%;
        animation: moveBG 12s ease infinite;

        position: relative;
        overflow: hidden;
    }

  
    body::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(2px);
    }

    h2, .info, form, .back-top {
        position: relative;
        z-index: 5;
    }


    .back-top {
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .btn-back {
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
        transition: 0.25s ease;
    }

    .btn-back:hover {
        background: rgba(255,255,255,0.35);
        transform: translateY(-3px);
    }


    h2 {
        text-align: center;
        font-size: 32px;
        margin-top: 60px;
        color: white;
        font-weight: 700;
        text-shadow: 0 2px 8px rgba(0,0,0,0.4);
    }

    .info {
        text-align: center;
        color: #e3f2fd;
        margin-bottom: 25px;
        font-size: 16px;
    }

    form {
        width: 90%;
        max-width: 380px;

        background: rgba(255,255,255,0.15);
        padding: 25px;
        border-radius: 16px;

        box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        backdrop-filter: blur(8px);
        animation: fadeIn 0.7s ease;
    }



    label {
        font-size: 17px;
        color: white;
        font-weight: 600;
    }

    select {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        margin-top: 8px;
        border-radius: 10px;
        background: rgba(255,255,255,0.85);
        border: 1px solid #bcd1e8;
        transition: 0.3s ease;
    }

    select:focus {
        border-color: #1e88e5;
        background: white;
        outline: none;
        box-shadow: 0 0 12px rgba(30,136,229,0.4);
        transform: scale(1.02);
    }

    button {
        width: 100%;
        padding: 14px;
        margin-top: 20px;
        background: linear-gradient(90deg, #014087ff, #1a78caff);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.25s ease;
        box-shadow: 0 8px 20px rgba(21,101,192,0.35);
    }

    button:hover {
        background: linear-gradient(90deg, #1e88e5, #42a5f5);
        transform: translateY(-3px);
        box-shadow: 0 12px 26px rgba(21,101,192,0.45);
    }

</style>

</head>

<body>

<div class="back-top">
    <a href="/loyalty-program/public/" class="btn-back">← Back to Home</a>
</div>

<h2>Join Subscription</h2>
<p class="info">Choose your tier and program type below</p>

<form action="/loyalty-program/public/subscription/join" method="POST">

    <label>Select Your Tier:</label>
    <select name="tier">
        <option value="silver">Silver</option>
        <option value="gold">Gold</option>
        <option value="platinum">Platinum</option>
    </select>

    <label>Program Type:</label>
    <select name="program_type">
        <option value="points_based">Points Based</option>
        <option value="value_based">Value Based</option>
    </select>

    <button type="submit">Create Subscription</button>

</form>

</body>
</html>
