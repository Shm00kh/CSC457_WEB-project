<?php include 'database.php'; ?> // Include the database connection file

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اكتشف السعودية - معرض المناطق</title>
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

            <section class="page-heading">
                <h1>معرض المناطق</h1>
                <p>يمكنك استعراض المناطق الإدارية في المملكة والانتقال إلى صفحة التفاصيل.</p>
            </section>

            <section class="filters-bar">
                <input type="text" id="searchInput" placeholder="ابحث عن منطقة...">

                <select id="regionFilter">
                    <option value="all">كل المناطق</option>
                    <option value="central">الوسطى</option>
                    <option value="western">الغربية</option>
                    <option value="eastern">الشرقية</option>
                    <option value="southern">الجنوبية</option>
                    <option value="northern">الشمالية</option>
                </select>
            </section>

            <section class="regions-grid">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM regions"); // Fetch all regions from the database
            while($row = mysqli_fetch_assoc($result)) { // Loop through each region and display it as a card
            ?>
                <article class="region-card"
                         data-name="<?php echo $row['name']; ?>"
                         data-group="<?php echo $row['category']; ?>"
                         data-link="details.php?id=<?php echo $row['id']; ?>">
                    <img src="<?php echo $row['hero_image']; ?>" alt="<?php echo $row['name']; ?>">
                    <div class="region-content">
                        <span class="region-tag"><?php echo $row['category']; ?></span>
                        <h3><?php echo $row['name']; ?></h3>
                        <p><?php echo $row['description']; ?></p>
                        <a href="details.php?id=<?php echo $row['id']; ?>" class="details-link">عرض التفاصيل</a>
                    </div>
                </article>
            <?php } ?>
            </section>

        </div>
    </main>

    <footer class="site-footer">
        <p>© اكتشف السعودية - جامعة الملك سعود</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>