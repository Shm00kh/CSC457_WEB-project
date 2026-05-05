<?php
session_start();
require_once '../database.php';

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET["id"])) {
    header("Location: dashboard.php");
    exit();
}

$id = (int)$_GET["id"];
$error = "";

function uploadImage($fileInputName, $oldPath) {
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]["error"] != 0) {
        return $oldPath;
    }

    $fileName = time() . "_" . basename($_FILES[$fileInputName]["name"]);
    $targetPath = "../images/regions/" . $fileName;
    $dbPath = "images/regions/" . $fileName;

    move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetPath);

    return $dbPath;
}


$stmt = $conn->prepare("SELECT * FROM regions WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    header("Location: dashboard.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $category = trim($_POST["category"]);
    $description = trim($_POST["description"]);
    $info = trim($_POST["info"]);
    $landmarks = trim($_POST["landmarks"]);

    $heroImage = uploadImage("hero_image", $data["hero_image"]);
    $gallery1 = uploadImage("gallery_image1", $data["gallery_image1"]);
    $gallery2 = uploadImage("gallery_image2", $data["gallery_image2"]);
    $gallery3 = uploadImage("gallery_image3", $data["gallery_image3"]);

    if ($name == "" || $category == "" || $description == "") {
        $error = "يرجى تعبئة الحقول المطلوبة";
    } else {
        $stmt = $conn->prepare("
            UPDATE regions 
            SET name = ?, category = ?, description = ?, info = ?, landmarks = ?, 
                hero_image = ?, gallery_image1 = ?, gallery_image2 = ?, gallery_image3 = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            "sssssssssi",
            $name,
            $category,
            $description,
            $info,
            $landmarks,
            $heroImage,
            $gallery1,
            $gallery2,
            $gallery3,
            $id
        );

        if ($stmt->execute()) {
            if ($_POST["action"] == "preview") {
                header("Location: update.php?id=" . $id);
                exit();
            } else {
                header("Location: dashboard.php?updated=1");
                exit();
            }
        }else {
            $error = "حدث خطأ أثناء تحديث المحتوى";
        } 
      
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث المحتوى - اكتشف السعودية</title>
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

        <div class="edit-top-row">
            <h1>تحديث المكان</h1>
            <p>المكان: <?php echo $data["name"]; ?></p>
        </div>

        <div class="edit-layout">

            <div class="edit-preview-card">
                <h2>المكان المحدد للتحديث</h2>

                <label>اسم المكان</label>
                <div class="readonly-box"><?php echo $data["name"]; ?></div>

                <div class="preview-actions">
                    <button type="submit" form="editForm" name="action" value="preview" class="edit-btn">تحديث</button>

                    <a href="delete.php?id=<?php echo $id; ?>" 
                       class="delete-btn"
                       onclick="return confirm('هل أنت متأكد من حذف هذا المكان؟');">
                      حذف المكان
                    </a>
                </div>

                <h3>المعاينة</h3>
                <p class="preview-title">الصورة الرئيسية الحالية</p>
                <img class="preview-main-img" src="../<?php echo $data["hero_image"]; ?>" alt="<?php echo $data["name"]; ?>">

                <p class="preview-title">صور المعرض الحالية</p>

                <div class="preview-gallery">
                    <?php if (!empty($data["gallery_image1"])) { ?>
                        <img src="../<?php echo $data["gallery_image1"]; ?>" alt="صورة المعرض الأولى">
                    <?php } ?>

                    <?php if (!empty($data["gallery_image2"])) { ?>
                        <img src="../<?php echo $data["gallery_image2"]; ?>" alt="صورة المعرض الثانية">
                    <?php } ?>

                    <?php if (!empty($data["gallery_image3"])) { ?>
                        <img src="../<?php echo $data["gallery_image3"]; ?>" alt="صورة المعرض الثالثة">
                    <?php } ?>
                </div>
            </div>

            <div class="admin-form-card">
                <h2>تعديل البيانات</h2>

                <?php if ($error != "") { ?>
                    <p class="admin-alert"><?php echo $error; ?></p>
                <?php } ?>

                <form id="editForm" method="POST" enctype="multipart/form-data">

                    <label>* اسم المكان</label>
                    <input type="text" name="name" value="<?php echo $data["name"]; ?>" required>

                    <label>* تحديث الصورة الرئيسية للمكان</label>
                    <input type="file" name="hero_image">

                    <label>* الوصف</label>
                    <textarea name="description" rows="4" required><?php echo $data["description"]; ?></textarea>

                    <label>* الموقع</label>
                    <select name="category" required>
                        <option value="central" <?php if ($data["category"] == "central") echo "selected"; ?>>الوسطى</option>
                        <option value="western" <?php if ($data["category"] == "western") echo "selected"; ?>>الغربية</option>
                        <option value="eastern" <?php if ($data["category"] == "eastern") echo "selected"; ?>>الشرقية</option>
                        <option value="southern" <?php if ($data["category"] == "southern") echo "selected"; ?>>الجنوبية</option>
                        <option value="northern" <?php if ($data["category"] == "northern") echo "selected"; ?>>الشمالية</option>
                    </select>

                    <label>* معلومات عامة</label>
                    <input type="text" name="info" value="<?php echo $data["info"]; ?>">

                    <label>* أبرز المعالم (افصل بينهم بفاصلة)</label>
                    <input type="text" name="landmarks" value="<?php echo $data["landmarks"]; ?>">

                    <h2>تحديث صور المعرض</h2>

                    <label>تحديث صورة المعرض الأولى</label>
                    <input type="file" name="gallery_image1">

                    <label>تحديث صورة المعرض الثانية</label>
                    <input type="file" name="gallery_image2">

                    <label>تحديث صورة المعرض الثالثة</label>
                    <input type="file" name="gallery_image3">

                    <button type="submit" name="action" value="save" class="admin-submit-btn">حفظ التغييرات</button>

                </form>
            </div>

        </div>

    </div>
</main>

<footer class="site-footer">
    <p>© اكتشف السعودية - جامعة الملك سعود</p>
</footer>

<script src="../script.js"></script>
</body>
</html>