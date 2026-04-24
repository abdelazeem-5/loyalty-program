<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Points Based Program</title>

    <style>

        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            background: linear-gradient(135deg, #0d1b2a, #1b263b);
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(3px);
        }


        .container {
            position: relative;
            z-index: 2;
            width: 90%;
            max-width: 600px;
            text-align: center;
            padding: 35px 25px;
            background: rgba(255,255,255,0.15);
            border-radius: 16px;
            box-shadow: 0 10px 28px rgba(0,0,0,0.25);
            backdrop-filter: blur(8px);
            animation: fadeIn 0.7s ease;
        }



        h1 {
            font-size: 32px;
            color: #ffffff;
            margin-bottom: 15px;
            text-shadow: 0 2px 6px rgba(0,0,0,0.4);
        }

        p {
            font-size: 18px;
            color: #d9e2ec;
            line-height: 1.6;
            margin-bottom: 25px;
        }


        .btn {
            display: inline-block;
            padding: 14px 22px;
            background: #007bff;
            color: white;
            font-size: 18px;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.3s;
            font-weight: 600;
        }

        .btn:hover {
            background: #0056d6;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0,123,255,0.4);
        }
    </style>

</head>
<body>

<div class="container">
    <h1>Points Based Program</h1>
    <p>Every purchase gives you points that you can redeem later for exclusive offers and rewards.</p>

    <a class="btn" href="/loyalty-program/public/">Return Home</a>
</div>

</body>
</html>
