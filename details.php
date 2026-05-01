<?php
// Connect to database
include 'database.php';

// Get region id from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Fetch region data from database
$result = mysqli_query($conn, "SELECT * FROM regions WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: regions.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اكتشف السعودية - التفاصيل</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <div class="container nav-container">
            <div class="logo">اكتشف السعودية</div>
            <nav class="main-nav">
                <a href="index.php">الرئيسية</a>
                <a href="regions.php">معرض المناطق</a>
                <a href="admin/login.php">دخول المشرف</a>
                <button id="modeToggle" class="mode-btn" type="button">الوضع الليلي</button>
            </nav>
        </div>
    </header>

    <main class="page">
        <div class="container">

            <section class="details-hero">
                <!-- Display hero image from database -->
                <img src="<?php echo $data['hero_image']; ?>" alt="<?php echo $data['name']; ?>">
            </section>

            <section class="details-wrapper">
                <div class="details-main card">
                    <!-- Display region name and description from database -->
                    <h1><?php echo $data['name']; ?></h1>
                    <p><?php echo $data['description']; ?></p>
                    <div class="info-box">
                        <h3>معلومات عامة</h3>
                        <p><?php echo $data['info']; ?></p>
                    </div>
                </div>

                <div class="details-side card">
                    <h3>أبرز المعالم</h3>
                    <ul>
                        <!-- Split landmarks string and display as list -->
                        <?php foreach(explode('،', $data['landmarks']) as $landmark) { ?>
                            <li><?php echo trim($landmark); ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </section>

            <!-- Display gallery images from database -->
            <section class="landmarks-gallery">
                <img src="<?php echo $data['gallery_image1']; ?>" alt="صورة 1">
                <img src="<?php echo $data['gallery_image2']; ?>" alt="صورة 2">
                <img src="<?php echo $data['gallery_image3']; ?>" alt="صورة 3">
            </section>

        </div>
    </main>

    <footer class="site-footer">
        <p>© اكتشف السعودية - جامعة الملك سعود</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>