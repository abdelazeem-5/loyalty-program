<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

<style>

body {
    font-family: "Segoe UI", Arial, sans-serif;
    margin: 0;
    padding: 0;

    background: linear-gradient(135deg, #0d47a1, #1565c0, #1e88e5);
    background-size: 400% 400%;
    animation: moveBG 12s ease infinite;

    min-height: 100vh;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    position: relative; 
}


.back-btn {
    position: absolute;
    top: 20px;
    left: 20px;

    background: rgba(255,255,255,0.25);
    color: #fff;
    padding: 10px 22px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 18px;
    font-weight: 600;

    backdrop-filter: blur(6px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.25);

    transition: 0.25s;
}

.back-btn:hover {
    background: rgba(255,255,255,0.35);
    transform: translateY(-3px);
}


h2 {
    text-align: center;
    color: white;
    font-size: 32px;
    margin-bottom: 8px;
    font-weight: 700;
    text-shadow: 0 3px 10px rgba(0,0,0,0.3);
}

.subtitle {
    color: #e3e3e3;
    font-size: 15px;
    margin-bottom: 22px;
}


form {
    width: 90%;
    max-width: 400px;

    background: rgba(255,255,255,0.92);
    padding: 28px;
    border-radius: 18px;

    box-shadow:
        0 12px 28px rgba(0,0,0,0.25),
        0 5px 12px rgba(0,0,0,0.12);

    backdrop-filter: blur(6px);

    animation: fadeUp 0.7s ease;
}


label {
    display: block;
    margin-top: 15px;
    font-size: 15px;
    font-weight: 700;
    color: #0d47a1;
}

input {
    width: 100%;
    padding: 12px;
    margin-top: 6px;

    border-radius: 10px;
    border: 1px solid #cfd6e1;
    font-size: 16px;

    background: #f7faff;
    transition: 0.25s ease;
}

input:focus {
    border-color: #1565c0;
    background: #eef4ff;
    transform: scale(1.02);
    box-shadow: 0 0 10px rgba(21,101,192,0.35);
    outline: none;
}

button {
    width: 100%;
    margin-top: 25px;
    padding: 14px;

    font-size: 18px;
    font-weight: 700;

    background: linear-gradient(90deg, #1565c0, #1e88e5);
    color: white;

    border: none;
    border-radius: 12px;
    cursor: pointer;

    box-shadow: 0 8px 20px rgba(21,101,192,0.35);
    transition: 0.25s;
}

button:hover {
    background: linear-gradient(90deg, #1e88e5, #42a5f5);
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(21,101,192,0.45);
}

.focused {
    transform: scale(1.02);
}

input, textarea, select, button {
    width: 100%;
    box-sizing: border-box;
}

</style>

</head>
<body>

<a href="/loyalty-program/public/customer/dashboard" class="back-btn">← Customer Panel</a>

<?php $customer = $_SESSION["user"]; ?>

<h2>Edit Profile</h2>
<p class="subtitle">Update your personal information</p>

<form action="/loyalty-program/public/customer/profile" method="POST">

    <label>Name:</label>
    <input type="text" name="name"
           value="<?= htmlspecialchars($customer['name']) ?>" required>

    <label>Email:</label>
    <input type="email" name="email"
           value="<?= htmlspecialchars($customer['email']) ?>" required>

    <label>New Password (optional):</label>
    <input type="password" name="password" placeholder="Enter new password">

    <button type="submit">Save Changes</button>

</form>

<script>
    const inputs = document.querySelectorAll("input");
    inputs.forEach(i => {
        i.addEventListener("focus", () => i.classList.add("focused"));
        i.addEventListener("blur", () => i.classList.remove("focused"));
    });
</script>

</body>
</html>
