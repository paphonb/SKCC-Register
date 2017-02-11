<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="Suankularb Computer Club">
    <meta name="description" content="สัปดาห์คอมพิวเตอร์ โรงเรียนสวนกุหลาบวิทยาลัย 2016 มาพร้อมนิทรรศการที่จะให้ทั้งความรู้ และความสนุก
  และการแข่งขันต่าง ๆ ที่มีเงินรางวัลมูลค่ารวมกว่า 26,000 บาท พร้อมทั้งของรางวัลสุดพิเศษมากมายสำหรับทุกคน">
    <meta property="og:title" content="Suankularb Computer Week 2016">
    <meta property="og:image" content="#">
    <meta property="og:description" content="สัปดาห์คอมพิวเตอร์ โรงเรียนสวนกุหลาบวิทยาลัย 2016 มาพร้อมนิทรรศการที่จะให้ทั้งความรู้ และความสนุก
  และการแข่งขันต่าง ๆ ที่มีเงินรางวัลมูลค่ารวมกว่า 26,000 บาท พร้อมทั้งของรางวัลสุดพิเศษมากมายสำหรับทุกคน">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Icons -->
    <!-- third-generation iPad with high-resolution Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/icons/favicon144.png">
    <!-- iPhone with high-resolution Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/icons/favicon114.png">
    <!-- first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/icons/favicon72.png">
    <!-- non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="img/icons/favicon57.png">
    <!-- basic favicon -->
    <link rel="shortcut icon" href="img/icons/favicon32.png">

    <!-- Include Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <!-- Site Properties -->
    <title>Suankularb Computer Week 2016</title>
    <link rel="stylesheet" type="text/css" href="dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="dist/components/site.css">

    <link rel="stylesheet" type="text/css" href="dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="dist/components/menu.css">

    <link rel="stylesheet" type="text/css" href="dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="dist/components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="dist/components/icon.css">
    <link rel="stylesheet" type="text/css" href="dist/components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="dist/components/transition.css">

    <!-- Include CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="dist/components/visibility.js"></script>
    <script src="dist/components/sidebar.js"></script>
    <script src="dist/components/transition.js"></script>
    <script>
        $(document)
            .ready(function() {

                // fix menu when passed
                $('.masthead')
                    .visibility({
                        once: false,
                        onBottomPassed: function() {
                            $('.fixed.menu').transition('fade in');
                        },
                        onBottomPassedReverse: function() {
                            $('.fixed.menu').transition('fade out');
                        }
                    });

                // create sidebar and attach to menu open
                $('.ui.sidebar')
                    .sidebar('attach events', '.toc.item');

            });
    </script>
</head>

<body>

    <!-- Following Menu -->
    <div class="ui medium top fixed hidden menu inverted items">
        <div class="item">
            <div class="ui tiny image">
                <img src="img/logo.png">
            </div>
            <div class="middle aligned content">
                Suankularb Computer Week 2016 : The Lost Joker
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="ui vertical inverted sidebar menu items">
        <div class="item">
            <div class="ui tiny image">
                <img src="img/logo.png">
            </div>
            <div class="middle aligned content">
                Suankularb Computer Week 2016 : The Lost Joker
            </div>
        </div>
    </div>


    <!-- Page Contents -->
    <div class="pusher">
        <div class="ui inverted vertical masthead center aligned segment items">

            <div class="ui container">
                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <div class="item">
                        <div class="ui tiny image">
                            <img src="img/logo.png">
                        </div>
                        <div class="middle aligned content">
                            Suankularb Computer Week 2016 : The Lost Joker
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui text container slideInUp animated">
                <img class="ui huge centered image zoomIn animated" src="img/logo.png" alt="Logo">
                <h1 class="ui inverted header slideInUp animated gold">
        Computer Week 2016
      </h1>
                <h2>"The Lost Joker"</h2>
                <p>
                    เตรียมตัวพบกับนิทรรศการ และการแแข่งขันสุดเร้าใจในสัปดาห์คอมพิวเตอร์ โรงเรียนสวนกุหลาบวิทยาลัย 2016 ซึ่งในปีนี้ก็มาพร้อมกับธีม The Lost Joker ที่ทุก ๆ คนมาตามหา Joker ที่หายตัวไป ในนิทรรศการสุดสนุก ๆ ที่มาพร้อมได้ความรู้ดี ๆ และการแข่งขันสุดมันสำหรับนักเรียนระดับชั้นมัธยมศึกษา
                    ที่มีเงินรางวัลมูลค่ารวมกว่า 26,000 บาท พร้อมของรางวัลสุดพิเศษติดไม้ติดมือกลับกันกันทุกคนอย่างแน่นอน
                </p>
            </div>

        </div>

        <div class="ui inverted basic fluid segment div">
            <div class="ui fluid container">
                <img class="ui fluid image" src="img/div.png" />
            </div>
        </div>

        <div class="ui vertical stripe segment">
            <div class="ui middle aligned stackable grid container">
                <div class="row">
                    <div class="eight wide column">
                        <h3 class="ui header">Exhibitions</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed rhoncus neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed ultricies velit.
                        </p>
                    </div>
                    <div class="eight wide right floated column">
                        <img src="img/ex.png" class="ui huge image">
                    </div>
                </div>
            </div>
        </div>

        <div class="ui inverted basic fluid segment fdiv">
            <div class="ui fluid container">
                <img class="ui fluid image" src="img/div.png" />
            </div>
        </div>

        <div class="ui vertical inverted stripe quote segment">
            <div class="ui equal width stackable internally celled grid">
                <div class="center aligned row">
                    <div class="column">
                        <img class="ui image" src="img/skoi.png" alt="skoi">
                        <h3>Suankularb Olympiad in <br />Informatics 2016</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed rhoncus neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed ultricies velit.
                        </p>
                        <a class="ui button" href="skoi.html">
                            <p>
                                ข้อมูลเพิ่มเติม
                            </p>
                        </a>
                    </div>
                    <div class="column">
                        <img class="ui image" src="img/skic.png" alt="skoi">
                        <h3>Suankularb Information and technology Contest 2016</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed rhoncus neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed ultricies velit.
                        </p>
                        <a class="ui button" href="skic.html">
                            <p>
                                ข้อมูลเพิ่มเติม
                            </p>
                        </a>
                    </div>
                    <div class="column">
                        <img class="ui image" src="img/skwac.png" alt="skoi">
                        <h3>Suankularb Web Application <br />Contest 2016</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed rhoncus neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed ultricies velit.
                        </p>
                        <a class="ui button" href="skwac.html">
                            <p>
                                ข้อมูลเพิ่มเติม
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="ui inverted vertical footer segment">
            <div class="ui container">
                <div class="ui inverted divider fluid"></div>
                <div class="ui inverted height grid">
                    <div class="two wide column">
                        <img class="ui small image middle" src="img/skcc.png" alt="Suankularb Computer Club">
                    </div>
                    <div class="twelve wide column middle">
                        <p>
                            <br> ชุมนุมคอมพิวเตอร์ โรงเรียนสวนกุหลาบวิทยาลัย<br /> อาคารสวนกุหลาบรำลึก (อาคาร 6) ชั้น 3<br /> 88 ถนนตรีเพชร แขวงวังบูรพาภิรมย์ เขตพระนคร กรุงเทพมหานคร 10200
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
