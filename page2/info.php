<?php
function h($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

$raw = file_get_contents("php://input");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Debug Info</title>

<style>
body {
    margin: 0;
    font-family: "Poppins", Arial, sans-serif;
    background: linear-gradient(135deg, #1e1b4b, #0f0f1a);
    color: #f3f4f6;
}

.container {
    max-width: 1100px;
    margin: 60px auto;
    padding: 40px;
}

h1 {
    text-align: center;
    color: #c084fc;
    margin-bottom: 35px;
    font-size: 34px;
}

.card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(14px);
    padding: 25px;
    border-radius: 18px;
    margin-bottom: 25px;
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 15px 45px rgba(0,0,0,0.6);
}

.card h2 {
    margin-top: 0;
    color: #e9d5ff;
}

pre {
    background: rgba(0,0,0,0.3);
    padding: 18px;
    border-radius: 14px;
    overflow-x: auto;
    white-space: pre-wrap;
    word-break: break-word;
    border: 1px solid rgba(255,255,255,0.1);
    font-size: 13px;
}

a {
    display: inline-block;
    padding: 10px 18px;
    border-radius: 12px;
    background: rgba(192,132,252,0.1);
    border: 1px solid rgba(192,132,252,0.3);
    color: #e9d5ff;
    font-weight: 600;
    text-decoration: none;
    transition: 0.25s ease;
}

a:hover {
    background: rgba(192,132,252,0.25);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(192,132,252,0.4);
}

details {
    background: rgba(255,255,255,0.05);
    border-radius: 18px;
    padding: 20px;
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 15px 45px rgba(0,0,0,0.6);
}

summary {
    cursor: pointer;
    font-weight: bold;
    font-size: 16px;
    color: #c084fc;
    margin-bottom: 15px;
}

summary:hover {
    color: #ffffff;
}

.footer {
    text-align: center;
    margin-top: 30px;
    opacity: 0.6;
    font-size: 13px;
}
</style>
</head>

<body>

<div class="container">

<h1>🟣 PHP Debug Console</h1>

<div class="card">
    <h2>⚙️ Basic Info</h2>
    <pre>
Request Method: <?= h($_SERVER['REQUEST_METHOD'] ?? '') ?>

Request URI: <?= h($_SERVER['REQUEST_URI'] ?? '') ?>

upload_max_filesize: <?= h(ini_get("upload_max_filesize")) ?>

post_max_size: <?= h(ini_get("post_max_size")) ?>
    </pre>
</div>

<div class="card">
    <h2>📥 GET</h2>
    <pre><?php print_r($_GET); ?></pre>
</div>

<div class="card">
    <h2>📤 POST</h2>
    <pre><?php print_r($_POST); ?></pre>
</div>

<div class="card">
    <h2>📦 PUT / Raw Body</h2>
    <pre><?= h($raw); ?></pre>
</div>

<div class="card">
    <h2>📁 FILES</h2>
    <pre><?php print_r($_FILES); ?></pre>
</div>

<div class="card">
    <h2>🌍 ENV</h2>
    <pre><?php print_r($_ENV); ?></pre>
</div>

<div class="card">
    <h2>🧪 SERVER</h2>
    <pre><?php print_r($_SERVER); ?></pre>
</div>

<details>
    <summary>🐘 Show phpinfo()</summary>
    <?php phpinfo(); ?>
</details>

<div class="card" style="text-align:center;">
    <a href="/">⬅ Back to Index</a>
</div>

<div class="footer">
    42 Webserv Project • Purple Theme
</div>

</div>

</body>
</html>
