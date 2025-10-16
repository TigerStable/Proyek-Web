<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="dashboard-wrapper">
        <div class="dashboard ">
            <h1>Selamat datang, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
            <p>Anda berhasil login.</p>
            <a href="logout.php"><button type="submit" class="btn">Logout</button></a> 
        </div>
    </div>
</body>

</html>