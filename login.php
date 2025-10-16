<?php
session_start();

$valid_username = "admin";
$valid_password = "12345";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION["error"] = "Username atau password salah!";
        header("Location: login.php");
        exit;
    }
}

$error = "";
if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    unset($_SESSION["error"]);
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login UNTAN</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
    <div class="login-wrapper">
        <div class="login-container">

            <div class="login-left">
                <img src="https://assets.siakadcloud.com/uploads/untan/bgaplikasi/1440.jpg" alt="UNTAN" class="login-bg">
                <div class="overlay-text">
                    <h4>SELAMAT DATANG</h4>
                    <h2>Sistem Administrasi Terintegrasi</h2>
                    <h3><b>Universitas Tanjungpura</b></h3>
                </div>
            </div>


            <div class="login-right">
                <img src="https://assets.siakadcloud.com/uploads/untan/logoaplikasi/1440.jpg" class="logo" alt="Logo UNTAN">
                <h2>Masuk dan Verifikasi</h2>
                <p><b>Baru!</b> Nikmati kemudahan sistem autentikasi tunggal untuk mengakses semua layanan dengan satu akun.</p>

                <?php if ($error): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>

                <div class="col-md-12">
                    <a href="google-login.php" class="btn-ggl btn-default btn-block" style="text-decoration: none; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 10px;">
                        <img src="https://quantum.sevima.com/assets/images/logo-google.svg" alt="" style="height: 20px;">
                        <span>Google</span>
                    </a>
                </div>

                <div class="title-login-email">
                    <span class="title-line"></span>
                    <p class="title-text">atau lanjutkan dengan</p>
                </div>

                <form method="POST" action="">
                    <div class="form-group">
                        <label>Email/akun pengguna<span class="required">*</span></label>
                        <input type="text" name="username" required placeholder="Masukkan email/NIM/NIP/username yang terdaftar">
                    </div>

                    <div class="form-group password-group">
                        <label>Password<span class="required">*</span></label>
                        <input type="password" id="password" name="password" required placeholder="Masukkan password">
                        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
                    </div>



                    <button type="submit" class="btn">Masuk</button>
                </form>

                <div class="forgot">
                    <a href="#">Lupa kata sandi?</a>
                </div>

                <div class="powered">
                    <span>Powered By</span>
                    <a href="https://sevima.com/" target="_blank">
                        <img width="110" src="https://assets.siakadcloud.com/assets/v1/img/logo-sevima-platform-200.png" alt="SEVIMA">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", function() {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);

            // ganti ikon sesuai kondisi
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    </script>


</body>

</html>