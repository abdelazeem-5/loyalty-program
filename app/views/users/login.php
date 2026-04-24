<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

<style>


.back-btn {
    position: absolute;
    top: 20px;
    left: 20px;

    background: rgba(255,255,255,0.18);
    padding: 10px 18px;
    border-radius: 10px;

    text-decoration: none;
    color: #fff;
    font-size: 16px;
    font-weight: 600;

    border: 1px solid rgba(255,255,255,0.35);
    backdrop-filter: blur(6px);

    box-shadow: 0 6px 15px rgba(0,0,0,0.25);
    transition: 0.25s;
}

.back-btn:hover {
    background: rgba(255,255,255,0.28);
    transform: translateY(-3px);
}



body {
    font-family: "Segoe UI", Arial, sans-serif;
    margin: 0;
    padding: 0;

    height: 100vh;
    width: 100%;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    background: linear-gradient(135deg, #0d47a1, #1976d2, #42a5f5);
    background-size: 400% 400%;
    animation: gradientFlow 12s ease infinite;
}


.brand {
    text-align: center;
    margin-bottom: 20px;
}

.brand h1 {
    font-size: 40px;
    color: #ffffff;
    margin: 0;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

.brand p {
    font-size: 16px;
    color: #e3f2fd;
    margin-top: 8px;
}

form {
    width: 380px;
    background: rgba(255,255,255,0.98);
    padding: 35px 32px;
    border-radius: 20px;

    box-shadow:
        0 12px 25px rgba(0,0,0,0.2),
        0 4px 12px rgba(0,0,0,0.1);

    animation: fadeInUp 0.85s ease;
}


label {
    font-size: 15px;
    color: #1a237e;
    font-weight: 600;
}

input {
    width: 100%;
    padding: 14px;
    margin: 12px 0 20px 0;
    font-size: 16px;
    border-radius: 12px;
    border: 1px solid #b0bec5;
    background: #f4f7fb;
    transition: 0.25s ease;
}

input:focus {
    border-color: #1565c0;
    background: #e8f1ff;
    outline: none;
    box-shadow: 0 0 10px rgba(21,101,192,0.3);
    transform: scale(1.02);
}

button {
    width: 100%;
    padding: 15px;
    font-size: 19px;
    font-weight: 700;

    background: linear-gradient(90deg, #1565c0, #1e88e5);
    color: #fff;

    border: none;
    border-radius: 12px;
    cursor: pointer;

    transition: 0.25s ease-in-out;
    box-shadow: 0 6px 14px rgba(21,101,192,0.35);
}

button:hover {
    background: linear-gradient(90deg, #1e88e5, #42a5f5);
    transform: translateY(-3px);
    box-shadow: 0 12px 22px rgba(21,101,192,0.45);
}

.alert {
    width: 380px;
    background: #ffebee;
    color: #c62828;
    border-left: 6px solid #b71c1c;
    padding: 14px;
    border-radius: 10px;
    font-size: 15px;
    margin-bottom: 15px;

    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

p {
    text-align: center;
    color: #e3f2fd;
    font-size: 15px;
    margin-top: 18px;
}

p a {
    color: #bbdefb;
    text-decoration: none;
    font-weight: 700;
}

p a:hover {
    text-decoration: underline;
}

input, textarea, select, button {
    width: 100%;
    box-sizing: border-box;
}

</style>

</head>

<body>

<a class="back-btn" href="/loyalty-program/public/">← Back to Home</a>

<div class="brand">
    <h1>Login</h1>
    <p>Your smart rewards system</p>
</div>

<?php if (isset($error)): ?>
    <div class="alert">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>

<form action="/loyalty-program/public/login" method="POST">

    <label>Email</label>
    <input type="email" name="email" placeholder="Enter your email" required>

    <label>Password</label>
    <input type="password" name="password" placeholder="Enter your password" required>

    <button type="submit">Login</button>
</form>

<p>
    Don,t have an account?
    <a href="/loyalty-program/public/select-user-type">Create an account</a>
</p>

</body>
</html>
