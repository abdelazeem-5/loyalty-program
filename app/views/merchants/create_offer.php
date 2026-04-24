<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Offer</title>

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
    }

    @keyframes bgMove {
        from { background-position: left; }
        to   { background-position: right; }
    }

    .offer-box {
        width: 90%;
        max-width: 400px;
        padding: 35px;
        border-radius: 16px;

        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);

        box-shadow: 0 15px 35px rgba(0,0,0,0.25);
        animation: fadeIn 0.7s ease;
    }



    h2 {
        text-align: center;
        color: white;
        font-size: 30px;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }

    label {
        color: #e3e9ff;
        font-weight: 600;
        font-size: 15px;
        margin-top: 15px;
        display: block;
    }

    input, textarea {
        width: 100%;
        padding: 13px;
        margin-top: 6px;
        border-radius: 10px;
        font-size: 16px;

        background: rgba(255,255,255,0.9);
        border: 1px solid #b8c6e0;

        transition: 0.25s;
        box-sizing: border-box;
    }

    textarea {
        height: 120px;
        resize: vertical;
    }

    input:focus, textarea:focus {
        border-color: #64b5f6;
        background: #eef6ff;
        outline: none;
        box-shadow: 0 0 10px rgba(100,181,246,0.7);
    }

    button {
        width: 100%;
        padding: 14px;
        font-size: 18px;
        margin-top: 25px;

        background: #2196f3;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;

        font-weight: 600;
        transition: 0.25s;
        box-sizing: border-box;
    }

    button:hover {
        background: #0d8af0;
        transform: translateY(-2px);
    }

</style>

</head>

<body>

<a class="back-top-btn" href="/loyalty-program/public/merchant/dashboard">← Merchant Panel</a>

<div class="offer-box">

    <h2>Add New Offer</h2>

    <form action="/loyalty-program/public/merchant/offers/create" method="POST">

        <label>Offer Title:</label>
        <input type="text" name="title" placeholder="Offer Title" required>

        <label>Description:</label>
        <textarea name="description" placeholder="Offer Description"></textarea>

        <label>Discount Value:</label>
        <input type="text" name="discount_value" placeholder="Discount Value" required>

        <button type="submit">Add Offer</button>
    </form>

</div>

</body>
</html>
