<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

<style>


body {
    font-family: "Segoe UI", Arial, sans-serif;
    margin: 0;
    padding: 0;

    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;

    background: linear-gradient(135deg, #0d47a1, #1565c0, #1e88e5);
    background-size: 400% 400%;
    animation: bgFlow 12s ease infinite;

    position: relative;
}




.back-btn {
    position: absolute;
    top: 20px;
    left: 20px;

    background: rgba(255,255,255,0.25);
    padding: 10px 20px;
    color: white;
    font-size: 17px;
    font-weight: 600;

    border-radius: 10px;
    text-decoration: none;

    backdrop-filter: blur(6px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.25);

    transition: 0.25s;
}

.back-btn:hover {
    background: rgba(255,255,255,0.35);
    transform: translateY(-3px);
}

h2 {
    color: white;
    text-align: center;
    font-size: 34px;
    margin-bottom: 12px;
    letter-spacing: 0.5px;
    text-shadow: 0 4px 12px rgba(0,0,0,0.3);
}

form {
    width: 350px;
    padding: 28px;

    background: rgba(255,255,255,0.95);
    border-radius: 18px;

    box-shadow:
        0 14px 30px rgba(0,0,0,0.25),
        0 6px 12px rgba(0,0,0,0.1);

    animation: fadeUp 0.7s ease;
}




input {
    width: 100%;
    padding: 14px;
    margin: 12px 0;

    font-size: 16px;
    border-radius: 10px;
    border: 1px solid #c5ccd8;

    background: #f3f7fc;
    transition: 0.25s ease;
}

input:focus {
    border-color: #1e88e5;
    background: #eef5ff;
    transform: scale(1.03);
    box-shadow: 0 0 12px rgba(30,136,229,0.35);
    outline: none;
}


button {
    width: 100%;
    padding: 14px;
    margin-top: 12px;

    font-size: 19px;
    font-weight: 700;

    background: linear-gradient(90deg, #1e88e5, #42a5f5);
    color: white;

    border: none;
    border-radius: 12px;
    cursor: pointer;

    box-shadow: 0 8px 18px rgba(21,101,192,0.35);
    transition: 0.25s;
}

button:hover {
    background: linear-gradient(90deg, #42a5f5, #64b5f6);
    transform: translateY(-3px);
    box-shadow: 0 12px 26px rgba(21,101,192,0.45);
}

.focused {
    transform: scale(1.03);
}
input, textarea, select, button {
    width: 100%;
    box-sizing: border-box;
}

</style>
</head>

<body>

<a href="/loyalty-program/public/" class="back-btn">← Back to Home</a>

<div>
    <h2>Admin Login</h2>

    <form action="/loyalty-program/public/admins/login" method="POST">
        <input type="email" name="email" placeholder="Admin Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>
</div>

<script>
    document.querySelectorAll("input").forEach(input => {
        input.addEventListener("focus", () => input.classList.add("focused"));
        input.addEventListener("blur", () => input.classList.remove("focused"));
    });
</script>

</body>
</html>
