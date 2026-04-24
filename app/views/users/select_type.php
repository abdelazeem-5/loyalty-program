<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select User Type</title>

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
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    background: linear-gradient(135deg, #0d47a1, #1976d2, #42a5f5);
    background-size: 400% 400%;
    animation: gradientFlow 12s ease infinite;
}


h2 {
    text-align: center;
    font-size: 32px;
    color: white;
    margin-bottom: 15px;
    margin-top: -10px;
    text-shadow: 0 3px 8px rgba(0,0,0,0.25);
    font-weight: 700;
}


form {
    width: 380px;
    padding: 28px;
    background: rgba(255,255,255,0.95);
    border-radius: 20px;

    box-shadow:
        0 12px 25px rgba(0,0,0,0.20),
        0 5px 12px rgba(0,0,0,0.08);

    backdrop-filter: blur(4px);
    animation: fadeInUp 0.75s ease;
}


label {
    font-size: 18px;
    cursor: pointer;

    display: flex;
    align-items: center;
    gap: 12px;

    padding: 14px;
    border-radius: 14px;

    border: 2px solid #cfd8dc;
    background: #f7f9fc;

    transition: 0.25s ease;
    margin-bottom: 18px;
}

label:hover {
    transform: translateY(-3px);
    background: #eef5ff;
    border-color: #64b5f6;
}

.selected {
    background: #e3f2fd !important;
    border-color: #1e88e5 !important;
    box-shadow: 0 4px 12px rgba(30,136,229,0.35);
}

label input[type="radio"] {
    transform: scale(1.4);
}

button {
    width: 100%;
    padding: 15px;

    font-size: 20px;
    font-weight: 700;

    background: linear-gradient(90deg, #1565c0, #1e88e5);
    color: white;

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

</style>

</head>
<body>

<a class="back-btn" href="/loyalty-program/public/">← Back to Home</a>

<h2>Select User Type</h2>

<form method="POST">

    <label>
        <input type="radio" name="user_type" value="customer" checked>
        <span>Customer</span>
    </label>

    <label>
        <input type="radio" name="user_type" value="merchant">
        <span>Merchant</span>
    </label>

    <button type="submit">Continue</button>

</form>

<script>
    const labels = document.querySelectorAll("label");
    const radios = document.querySelectorAll("input[type='radio']");

    radios.forEach((radio, index) => {
        radio.addEventListener("change", () => {
            labels.forEach(label => label.classList.remove("selected"));
            labels[index].classList.add("selected");
        });
    });

    labels[0].classList.add("selected");
</script>

</body>
</html>
