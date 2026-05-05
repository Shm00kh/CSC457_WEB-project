<?php
session_start();
include '../database.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username == "" || $password == "") {
        $error = "يرجى إدخال اسم المستخدم وكلمة المرور";
    } else {
        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        if ($admin && $password === $admin["password"]) {
            $_SESSION["admin_id"] = $admin["id"];
            $_SESSION["admin_username"] = $admin["username"];

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "اسم المستخدم أو كلمة المرور غير صحيحة";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول المشرف - اكتشف السعودية</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<header class="site-header">
    <div class="container nav-container">
        <div class="logo">لوحة المشرف</div>

        <nav class="main-nav">
            <a href="../index.php">زيارة الموقع</a>
            <button id="modeToggle" class="mode-btn" type="button">الوضع الليلي</button>
        </nav>
    </div>
</header>

<main class="admin-login-page">
    <div class="admin-login-card">
        <h1>تسجيل دخول المشرف</h1>

        <?php if ($error != "") { ?>
            <p class="admin-error"><?php echo $error; ?></p>
        <?php } ?>

        <form method="POST" action="">
            <label for="username">اسم المستخدم</label>
            <input type="text" id="username" name="username" placeholder="أدخل اسم المستخدم">

            <label for="password">كلمة المرور</label>
            <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور">

            <button type="submit" class="primary-btn">دخول</button>
        </form>
    </div>
</main>

<script src="../script.js"></script>

</body>
</html>