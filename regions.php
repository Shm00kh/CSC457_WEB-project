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

                <article class="region-card" data-name="الرياض" data-group="central" data-link="details.php?region=riyadh">
                    <img src="images\regions\الرياض.jpg" alt="الرياض">
                    <div class="region-content">
                        <span class="region-tag">الوسطى</span>
                        <h3>الرياض</h3>
                        <p>عاصمة المملكة ومركزها السياسي والإداري والاقتصادي.</p>
                        <a href="details.php?region=riyadh" class="details-link">عرض التفاصيل</a>
                    </div>
                </article>

                <article class="region-card" data-name="مكة المكرمة" data-group="western" data-link="details.php?region=makkah">
                    <img src="images\regions\مكة .jpg" alt="مكة المكرمة">
                    <div class="region-content">
                        <span class="region-tag">الغربية</span>
                        <h3>مكة المكرمة</h3>
                        <p>منطقة ذات مكانة دينية عظيمة وتضم مكة وجدة والطائف.</p>
                        <a href="details.php?region=makkah" class="details-link">عرض التفاصيل</a>
                    </div>
                </article>

                <article class="region-card" data-name="المدينة المنورة" data-group="western" data-link="details.php?region=madinah">
                    <img src="images\regions\المدينة.jpg" alt="المدينة المنورة">
                    <div class="region-content">
                        <span class="region-tag">الغربية</span>
                        <h3>المدينة المنورة</h3>
                        <p>منطقة تاريخية ودينية مهمة وتضم المسجد النبوي الشريف.</p>
                        <a href="details.php?region=madinah" class="details-link">عرض التفاصيل</a>
                    </div>
                </article>

                <article class="region-card" data-name="القصيم" data-group="central" data-link="details.php?region=qassim">
                    <img src="images\regions\القصيم.jpg" alt="القصيم">
                    <div class="region-content">
                        <span class="region-tag">الوسطى</span>
                        <h3>القصيم</h3>
                        <p>تشتهر بالنشاط الزراعي والأسواق الشعبية والتراث المحلي.</p>
                        <a href="details.php?region=qassim" class="details-link">عرض التفاصيل</a>
                    </div>
                </article>

                <article class="region-card" data-name="المنطقة الشرقية" data-group="eastern" data-link="details.php?region=eastern">
                    <img src="images\regions\الشرقية.jpg" alt="المنطقة الشرقية">
                    <div class="region-content">
                        <span class="region-tag">الشرقية</span>
                        <h3>المنطقة الشرقية</h3>
                        <p>منطقة اقتصادية مهمة وتطل على الخليج العربي.</p>
                        <a href="details.php?region=eastern" class="details-link">عرض التفاصيل</a>
                    </div>
                </article>

                <article class="region-card" data-name="عسير" data-group="southern" data-link="details.php?region=asir">
                    <img src="images\regions\عسير.jpg" alt="عسير">
                    <div class="region-content">
                        <span class="region-tag">الجنوبية</span>
                        <h3>عسير</h3>
                        <p>منطقة جبلية جميلة تشتهر بأجوائها المعتدلة وطبيعتها.</p>
                        <a href="details.php?region=asir" class="details-link">عرض التفاصيل</a>
                    </div>
                </article>



                <article class="region-card" data-name="حائل" data-group="northern" data-link="details.php?region=hail">
                    <img src="images\regions\حائل.jpg" alt="حائل">
                    <div class="region-content">
                        <span class="region-tag">الشمالية</span>
                        <h3>حائل</h3>
                        <p>منطقة معروفة بتاريخها وتراثها وموقعها الجغرافي.</p>
                        <a href="details.php?region=hail" class="details-link">عرض التفاصيل</a>
                    </div>
                </article>

                <article class="region-card" data-name="جازان" data-group="southern" data-link="details.php?region=jazan">
                    <img src="images\regions\جازان.jpg" alt="جازان">
                    <div class="region-content">
                        <span class="region-tag">الجنوبية</span>
                        <h3>جازان</h3>
                        <p>منطقة ساحلية جميلة تشتهر بالطبيعة والتنوع البيئي.</p>
                        <a href="details.php?region=jazan" class="details-link">عرض التفاصيل</a>
                    </div>
                </article>

            </section>

        </div>
    </main>

    <footer class="site-footer">
        <p>© اكتشف السعودية - جامعة الملك سعود</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>