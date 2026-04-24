<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>

<style>

body {
    font-family: "Segoe UI", Arial, sans-serif;
    margin: 0;
    padding: 0;

    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    background: linear-gradient(135deg, #0d47a1, #1565c0, #1e88e5);
    background-size: 400% 400%;
    animation: flowBG 12s ease infinite;
    position: relative;
}


.back-btn {
    position: absolute;
    top: 20px;
    left: 20px;
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

.back-btn:hover {
    background: rgba(255,255,255,0.35);
    transform: translateY(-3px);
}


h2 {
    text-align: center;
    font-size: 32px;
    color: white;
    margin-bottom: 10px;
    text-shadow: 0 3px 8px rgba(0,0,0,0.25);
    font-weight: 700;
}

.subtitle {
    color: #e1ecff;
    margin-top: -8px;
    margin-bottom: 20px;
    font-size: 15px;
    text-align: center;
}


form {
    width: 90%;
    max-width: 380px;
    background: rgba(255,255,255,0.9);
    padding: 28px;
    border-radius: 18px;
    backdrop-filter: blur(10px);

    box-shadow:
        0 12px 28px rgba(0,0,0,0.25),
        0 5px 10px rgba(0,0,0,0.15);

    animation: fadeUp 0.7s ease;
}


input {
    width: 100%;
    padding: 13px;
    margin: 12px 0;
    font-size: 16px;

    border-radius: 10px;
    border: 1px solid #cfd6e1;
    background: #f7faff;
    transition: 0.25s ease;
}

input:focus {
    border-color: #1e88e5;
    background: #eef4ff;
    box-shadow: 0 0 10px rgba(30,136,229,0.35);
    outline: none;
    transform: scale(1.02);
}

.focused {
    transform: scale(1.02);
}


button {
    width: 100%;
    padding: 15px;
    margin-top: 12px;

    font-size: 19px;
    font-weight: 700;

    background: linear-gradient(90deg, #1565c0, #1e88e5);
    color: white;

    border: none;
    border-radius: 12px;
    cursor: pointer;

    transition: 0.25s ease;
    box-shadow: 0 8px 20px rgba(21,101,192,0.35);
}

button:hover {
    background: linear-gradient(90deg, #1e88e5, #42a5f5);
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(21,101,192,0.45);
}

input, textarea, select, button {
    width: 100%;
    box-sizing: border-box;
}

</style>

</head>

<body>

<a href="/loyalty-program/public/select-user-type" class="back-btn">← Back</a>

<h2>Customer Registration</h2>
<p class="subtitle">Create your customer account to start earning rewards</p>

<form action="/loyalty-program/public/register-customer" method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="password" name="password" placeholder="Create Password" required>

    <button type="submit">Register</button>
</form>

<script>
    const inputs = document.querySelectorAll("input");

    inputs.forEach(input => {
        input.addEventListener("focus", () => input.classList.add("focused"));
        input.addEventListener("blur", () => input.classList.remove("focused"));
    });
</script>

</body>
</html>
