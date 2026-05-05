<?php
session_start();
require_once '../database.php';

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit();
}

$error = "";

function uploadImage($fileInputName) {
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]["error"] != 0) {
        return "";
    }

    $fileName = time() . "_" . basename($_FILES[$fileInputName]["name"]);
    $targetPath = "../images/regions/" . $fileName;
    $dbPath = "images/regions/" . $fileName;

    move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetPath);

    return $dbPath;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $category = trim($_POST["category"]);
    $description = trim($_POST["description"]);
    $info = trim($_POST["info"]);
    $landmarks = trim($_POST["landmarks"]);

    $heroImage = uploadImage("hero_image");
    $gallery1 = uploadImage("gallery_image1");
    $gallery2 = uploadImage("gallery_image2");
    $gallery3 = uploadImage("gallery_image3");

    if ($name == ""  || $category == ""  || $description == "" || $heroImage == "") {
        $error = "يرجى تعبئة الحقول المطلوبة";
    } else {
        $stmt = $conn->prepare("
            INSERT INTO regions 
            (name, category, description, info, landmarks, hero_image, gallery_image1, gallery_image2, gallery_image3)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "sssssssss",
            $name,
            $category,
            $description,
            $info,
            $landmarks,
            $heroImage,
            $gallery1,
            $gallery2,
            $gallery3
        );

        if ($stmt->execute()) {
            header("Location: dashboard.php?added=1");
            exit();
        } else {
            $error = "حدث خطأ أثناء إضافة المحتوى";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة محتوى - اكتشف السعودية</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<header class="site-header">
    <div class="container nav-container">
        <div class="logo">لوحة تحكم المشرف</div>

        <nav class="main-nav">
            <a href="dashboard.php">لوحة التحكم</a>
            <button id="modeToggle" class="mode-btn" type="button">الوضع الليلي</button>
            <a href="login.php" class="logout-btn">تسجيل الخروج</a>
        </nav>
    </div>
</header>

<main class="admin-page">
    <div class="container">

        <div class="admin-form-card">
            <h1>إضافة مكان جديد</h1>

            <?php if ($error != "") { ?>
                <p class="admin-alert"><?php echo $error; ?></p>
            <?php } ?>

            <form method="POST" enctype="multipart/form-data">

                <label>* اسم المكان</label>
                <input type="text" name="name" placeholder="مثال: العلا" required>

                <label>* الصورة الرئيسية للمكان</label>
                <input type="file" name="hero_image" required>

                <label>* الوصف</label>
                <textarea name="description" rows="4" placeholder="مثال: منطقة تاريخية وسياحية تتميز بطبيعتها ومعالمها الفريدة." required></textarea>

                <label>* الموقع</label>
                <select name="category" required>
                    <option value="">اختر المنطقة..</option>
                    <option value="central">الوسطى</option>
                    <option value="western">الغربية</option>
                    <option value="eastern">الشرقية</option>
                    <option value="southern">الجنوبية</option>
                    <option value="northern">الشمالية</option>
                </select>

                <label>* معلومات عامة</label>
                <input type="text" name="info" placeholder="مثال: تشتهر بتاريخها العريق ومواقعها السياحية.">

                <label>* أبرز المعالم (افصل بينهم بفاصلة)</label>
                <input type="text" name="landmarks" placeholder="مثال: جبل الفيل، البلدة القديمة، واحة العلا">

                <h2>صور المعرض</h2>

                <label>* صورة المعرض الأولى</label>
                <input type="file" name="gallery_image1">

                <label>صورة المعرض الثانية (اختياري)</label>
                <input type="file" name="gallery_image2">

                <label>صورة المعرض الثالثة (اختياري)</label>
                <input type="file" name="gallery_image3">

                <button type="submit" class="admin-submit-btn">إضافة المكان</button>

            </form>
        </div>

    </div>
</main>

<footer class="site-footer">
    <p>© اكتشف السعودية - جامعة الملك سعود</p>
</footer>

<script src="../script.js"></script>
</body>
</html>