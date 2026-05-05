<?php
session_start();
include '../database.php';

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

$message = "";

if (isset($_GET["deleted"])) {
    $message = "تم حذف السجل بنجاح";
}

if (isset($_GET["added"])) {
    $message = "تمت إضافة المحتوى بنجاح";
}

if (isset($_GET["updated"])) {
    $message = "تم تحديث المحتوى بنجاح";
}

$result = mysqli_query($conn, "SELECT * FROM regions ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - اكتشف السعودية</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<header class="site-header">
    <div class="container nav-container">
        <div class="logo">لوحة تحكم المشرف</div>

        <nav class="main-nav">
            <a href="../index.php">الصفحة الرئيسية</a>
            <button id="modeToggle" class="mode-btn" type="button">الوضع الليلي</button>
            <a href="login.php" class="logout-btn">تسجيل الخروج</a>
        </nav>
    </div>
</header>

<main class="admin-page">
    <div class="container">

    <?php if ($message != "") { ?>
            <p class="admin-alert"><?php echo $message; ?></p>
        <?php } ?>

        <section class="page-heading">
            <h1>إدارة المحتوى</h1>
            <p class="admin-note">استخدم هذه الصفحة لإدارة محتوى الموقع من خلال عرض السجلات وإضافة أو تعديل أو حذف المحتوى.</p>
        </section>

        

        <a href="add.php" class="primary-btn admin-add-btn">إضافة محتوى جديد</a>

        <div class="admin-table-card">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>المنطقة</th>
                        <th>التصنيف</th>
                        <th>الوصف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["category"]; ?></td>
                            <td><?php echo $row["description"]; ?></td>
                            <td class="admin-actions">
                                <a class="edit-btn" href="update.php?id=<?php echo $row["id"]; ?>">تعديل</a>

                                <a class="delete-btn"
                                   href="delete.php?id=<?php echo $row["id"]; ?>"
                                   onclick="return confirm('هل أنت متأكد من حذف هذا السجل؟');">
                                   حذف
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</main>

<footer class="site-footer">
    <p>© اكتشف السعودية - جامعة الملك سعود</p>
</footer>

<script src="../script.js"></script>
</body>
</html>