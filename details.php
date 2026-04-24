<?php
$region = isset($_GET['region']) ? $_GET['region'] : 'riyadh';

$regions = [
    "riyadh" => [
        "title" => "الرياض",
        "description" => "تعد منطقة الرياض من أهم مناطق المملكة العربية السعودية، وتضم العاصمة الرياض التي تمثل المركز السياسي والإداري للمملكة.",
        "info" => "تتميز المنطقة بنمو عمراني كبير، وتحتضن العديد من المراكز الثقافية والتاريخية والمعالم الحديثة.",
        "hero" => "images/regions/الرياض.jpg",
        "landmarks" => ["برج المملكة", "قصر المصمك", "المتحف الوطني"],
        "gallery" => [
            "images\Riyadh\R1.jpg",
            "images\Riyadh\R2.jpg",
            "images\Riyadh\R3.jpg"
        ]
    ],
    "makkah" => [
        "title" => "مكة المكرمة",
        "description" => "تضم منطقة مكة المكرمة عددًا من أهم المدن في المملكة، ومنها مكة المكرمة وجدة والطائف.",
        "info" => "تتميز بمكانتها الدينية والتاريخية العظيمة، وتعد من أكثر المناطق زيارة في العالم الإسلامي.",
        "hero" => "images/regions/مكة .jpg",
        "landmarks" => ["المسجد الحرام", "جدة التاريخية", "الطائف"],
        "gallery" => [
            "images\Makkah\M1.jpg",
            "images\Makkah\M2.jpg",
            "images\Makkah\M3.jpg"
        ]
    ],
    "madinah" => [
        "title" => "المدينة المنورة",
        "description" => "تعد من أهم المناطق في المملكة لما لها من مكانة دينية وتاريخية.",
        "info" => "ارتبطت المدينة المنورة بتاريخ إسلامي عظيم وتعد مقصدًا مهمًا للزوار.",
        "hero" => "images/regions/المدينة.jpg",
        "landmarks" => ["المسجد النبوي", "جبل أحد", "قباء"],
        "gallery" => [
            "images\Madinah\M1.jpg",
            "images\Madinah\M2.jpg",
            "images\Madinah\M3.jpg"
        ]
    ],
    "qassim" => [
        "title" => "القصيم",
        "description" => "تشتهر منطقة القصيم بالنشاط الزراعي وأسواقها وتراثها المحلي.",
        "info" => "تعد من المناطق المهمة في وسط المملكة، ولها حضور اقتصادي وثقافي.",
        "hero" => "images/regions/القصيم.jpg",
        "landmarks" => ["بريدة", "عنيزة", "الأسواق الشعبية"],
        "gallery" => [
            "images\Qassim\Q1.jpg",
            "images\Qassim\Q2.jpg",
            "images\Qassim\Q3.jpg"
        ]
    ],
    "eastern" => [
        "title" => "المنطقة الشرقية",
        "description" => "تعد المنطقة الشرقية من أكبر مناطق المملكة، وتتميز بأهميتها الاقتصادية.",
        "info" => "تضم عددًا من المدن المهمة وتعد مركزًا اقتصاديًا بارزًا وتطل على الخليج العربي.",
        "hero" => "images/regions/الشرقية.jpg",
        "landmarks" => ["الدمام", "الخبر", "الأحساء"],
        "gallery" => [
            "images\Sharqiyah\S1.jpg",
            "images\Sharqiyah\S2.jpg",
            "images\Sharqiyah\S3.jpg"
        ]
    ],
    "asir" => [
        "title" => "عسير",
        "description" => "تتميز عسير بطبيعتها الجبلية وأجوائها الجميلة ومكانتها السياحية.",
        "info" => "تعد من أبرز المناطق السياحية في المملكة لما تمتلكه من تنوع طبيعي وثقافي.",
        "hero" => "images/regions/عسير.jpg",
        "landmarks" => ["أبها", "رجال ألمع", "السودة"],
        "gallery" => [
            "images\Asir\A1.jpg",
            "images\Asir\A2.jpg",
            "images\Asir\A3.jpg"
        ]
    ],
    
    
    "hail" => [
        "title" => "حائل",
        "description" => "تشتهر حائل بتاريخها العريق وتراثها الثقافي وموقعها المميز.",
        "info" => "ارتبطت المنطقة بعدد من الجوانب التاريخية والتراثية المهمة.",
        "hero" => "images/regions/حائل.jpg",
        "landmarks" => ["مدينة حائل", "جبل أجا", "جبل سلمى"],
        "gallery" => [
            "images\Hail\H1.jpg",
            "images\Hail\H2.jpg",
            "images\Hail\H3.jpg"
        ]
    ],
    "jazan" => [
        "title" => "جازان",
        "description" => "تتميز جازان بطبيعتها الساحلية والزراعية وتنوعها البيئي.",
        "info" => "تعد من المناطق الحيوية في جنوب المملكة وتشتهر بالتنوع الطبيعي.",
        "hero" => "images/regions/جازان.jpg",
        "landmarks" => ["جازان", "فرسان", "فيفاء"],
        "gallery" => [
            "images\Jazan\J1.jpg",
            "images\Jazan\J2.jpg",
            "images\Jazan\J3.jpg"
        ]
    ]
];

if (!array_key_exists($region, $regions)) {
    $region = "riyadh";
}

$data = $regions[$region];
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
                <img src="<?php echo $data['hero']; ?>" alt="<?php echo $data['title']; ?>">
            </section>

            <section class="details-wrapper">
                <div class="details-main card">
                    <h1><?php echo $data['title']; ?></h1>
                    <p><?php echo $data['description']; ?></p>

                    <div class="info-box">
                        <h3>معلومات عامة</h3>
                        <p><?php echo $data['info']; ?></p>
                    </div>
                </div>

                <div class="details-side card">
                    <h3>أبرز المعالم</h3>
                    <ul>
                        <?php foreach ($data['landmarks'] as $landmark) { ?>
                            <li><?php echo $landmark; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </section>

            <section class="landmarks-gallery">
                <?php foreach ($data['gallery'] as $image) { ?>
                    <img src="<?php echo $image; ?>" alt="معلم في <?php echo $data['title']; ?>">
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