<?php
session_start();
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabungan Digital - Login</title>
    <link rel="stylesheet" href="login.css" >
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Tabungan Digital</h2>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message">
                    <p>⚠️ <?= htmlspecialchars($_SESSION['error']); ?></p>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <form action="proses_login.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">LOGIN</button>
            </form>
        </div>
        <div class="footer">
            <p id="current-time"></p>
        </div>
    </div>

    <script>
        function updateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            document.getElementById('current-time').textContent = now.toLocaleDateString('id-ID', options);
        }

        setInterval(updateTime, 1000);
        updateTime();
    </script>
</body>
</html>
