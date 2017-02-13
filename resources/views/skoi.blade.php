
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
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/icons/favicon144.png">
  <!-- iPhone with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/icons/favicon114.png">
  <!-- first- and second-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/icons/favicon72.png">
  <!-- non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="/img/icons/favicon57.png">
  <!-- basic favicon -->
  <link rel="shortcut icon" href="/img/icons/favicon32.png">

  <!-- Include Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

  <!-- Site Properties -->
  <title>Suankularb Computer Week 2016 : SKOI</title>
  <link rel="stylesheet" type="text/css" href="/dist/components/reset.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/site.css">

  <link rel="stylesheet" type="text/css" href="/dist/components/container.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/grid.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/header.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/image.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/menu.css">

  <link rel="stylesheet" type="text/css" href="/dist/components/divider.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/dropdown.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/segment.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/button.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/list.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/icon.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/sidebar.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/table.css">
  <link rel="stylesheet" type="text/css" href="/dist/components/transition.css">

  <!-- Include CSS -->
  <link rel="stylesheet" href="/css/animate.css">
  <link rel="stylesheet" href="/css/style.css">


  <script src="/https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="/dist/components/visibility.js"></script>
  <script src="/dist/components/sidebar.js"></script>
  <script src="/dist/components/transition.js"></script>
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
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;

    })
  ;
  </script>
</head>
<body>

<!-- Following Menu -->
<div class="ui medium top fixed hidden menu inverted items">
  <div class="item">
    <div class="ui tiny image">
      <img src="/img/logo.png">
    </div>
    <div class="ui tiny image">
      <img src="/img/skoi.png">
    </div>
  </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu items">
  <div class="item">
    <div class="ui tiny image">
      <img src="/img/logo.png">
    </div>
    <div class="ui tiny image">
      <img src="/img/skoi.png">
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
            <img src="/img/logo.png">
          </div>
            <div class="middle aligned content">
              Suankularb Computer Week 2016 : The Lost Joker
            </div>
        </div>
      </div>
    </div>

    <div class="ui text container slideInUp animated">
      <img class="ui huge centered image zoomIn animated" src="/img/skoi.png" alt="Logo">
      <h1 class="ui inverted header slideInUp animated gold">
        Suankularb Olympiad in Informatics 2016
      </h1>
      <h2>การแข่งขันเขียนโปรแกรมคอมพิวเตอร์ภาษา C/C++ ระดับมัธยมศึกษา โรงเรียนสวนกุหลาบวิทยาลัย 2016</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed
        rhoncus neque. Pellentesque habitant morbi tristique senectus et
        netus et malesuada fames ac turpis egestas. Maecenas sed ultricies
        velit.
      </p>
    </div>

  </div>

  <div class="ui inverted basic fluid segment div">
    <div class="ui fluid container">
      <img class="ui fluid image" src="/img/div.png" />
    </div>
  </div>

  <div class="ui vertical stripe segment">
    <h2 class="ui header centered gold" style="font-size: 2.5em;">กติกาและข้อกำหนดของการแข่งขัน</h2>
    <br />
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="ten wide column">
          <h3 class="ui header">คุณสมบัติและเงื่อนไขของผู้เข้าแข่งขัน</h3>
          <ul class="ui list">
            <li><p>เป็นนักเรียนที่กำลังศึกษาอยู่ในระดับชั้นมัธยมศึกษาปีที่ 1-6</p></li>
            <li><p>1 ทีมมีสมาชิก 2 คน และทั้ง 2 คนต้องมาจากโรงเรียนเดียวกัน</p></li>
            <li><p>แต่ละโรงเรียนสามารถส่งทีมเข้าร่วมการแข่งขันได้ไม่เกินโรงเรียนละ 3 ทีม</p></li>
            <li><p>แต่ละทีมต้องมีอาจารย์ที่ปรึกษาทีม 1 คนที่อยู่โรงเรียนเดียวกับผู้เข้าแข่งขัน</p></li>
            <li><p>หากเป็นโรงเรียนเดียวกันแต่คนละทีม สามารถใช้อาจารย์ที่ปรึกษาทีมคนเดียวกันได้</p></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="ui inverted basic fluid segment fdiv">
    <div class="ui fluid container">
      <img class="ui fluid image" src="/img/div.png" />
    </div>
  </div>

  <div class="ui vertical stripe segment inverted">
    <h2 class="ui header centered gold" style="font-size: 2.5em;">รูปแบบการแข่งขัน</h2>
    <br />
    <div class="ui middle aligned stackable grid container inverted">
      <div class="row">
        <div class="eight wide column">
          <h3 class="ui header inverted">รอบที่ 1</h3>
          <ul class="ui list inverted">
            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
          </ul>
        </div>
        <div class="eight wide column">
          <h3 class="ui header inverted">รอบที่ 2</h3>
          <ul class="ui list inverted">
            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
          </ul>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="ui inverted basic fluid segment div">
    <div class="ui fluid container">
      <img class="ui fluid image" src="/img/div.png" />
    </div>
  </div>

  <div class="ui vertical stripe segment" style="background: #fff;">
    <h2 class="ui header centered gold" style="font-size: 2.5em;">รางวัล</h2>
    <br />
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="ten wide column">
          <ul class="ui list">
            <li><p>ชนะเลิศ: 3,000 บาท/ทีม พร้อมเกียรติบัตรสำหรับสมาชิกทุกคนในทีม</p></li>
            <li><p>รองชนะเลิศลำดับที่ 1: 2,000 บาท/ทีม พร้อมเกียรติบัตรสำหรับสมาชิกทุกคนในทีม</p></li>
            <li><p>รองชนะเลิศลำดับที่ 2: 1,000 บาท/ทีม พร้อมเกียรติบัตรสำหรับสมาชิกทุกคนในทีม</p></li>
            <li><p>ผู้เข้าร่วมการแข่งขัน: เกียรติบัตรสำหรับผู้เข้าร่วมการแข่งขันทุกคน</p></li>
          </ul>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="ui inverted basic fluid segment fdiv">
    <div class="ui fluid container">
      <img class="ui fluid image" src="/img/div.png" />
    </div>
  </div>

  <div class="ui vertical stripe segment inverted">
    <h2 class="ui header centered gold" style="font-size: 2.5em;">สถานที่จัดการแข่งขัน</h2>
    <br />
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="twenty wide column">
          <p>
            อาคารสวนกุหลาบรำลึก (อาคาร 6) ชั้น 3 โรงเรียนสวนกุหลาบวิทยาลัย
            88 ถนนตรีเพชร แขวงวังบูรพาภิรมย์ เขตพระนคร กรุงเทพมหานคร 10200
          </p>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="ui inverted basic fluid segment div">
    <div class="ui fluid container">
      <img class="ui fluid image" src="/img/div.png" />
    </div>
  </div>

  <div class="ui vertical stripe segment" style="background: #fff;">
    <h2 class="ui header centered gold" style="font-size: 2.5em;">กำหนดการ</h2>
    <br />
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="twelve wide column centered">
          <table class="ui large yellow selectable celled table">
            <thead>
              <tr>
                <th>เวลา</th>
                <th>กิจกรรม</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>วันนี้ - 24 พฤศจิกายน 2559</td>
                <td>รับสมัครผู้เข้าร่วมการแข่งขัน</td>
              </tr>
              <tr>
                <td>1 ธันวาคม 2559</td>
                <td>Suankularb Olympiad in Informatics 2016</td>
              </tr>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="ui inverted basic fluid segment fdiv">
    <div class="ui fluid container">
      <img class="ui fluid image" src="/img/div.png" />
    </div>
  </div>

    <div class="ui inverted basic fluid segment div centered">
      <h2 class="ui header centered gold" style="font-size: 2.5em;">สมัครเข้าร่วมการแข่งขัน</h2>
      <br />
      <div class="ui fluid container center aligned">
        <a href="{{route('skoi-register')}}"><button class="ui huge inverted button"><p>สมัครเข้าร่วมการแข่งขัน</p></button></a>
      </div>
    </div>

  <div class="ui inverted vertical footer segment">
    <div class="ui container">
      <div class="ui inverted divider fluid"></div>
      <div class="ui inverted height grid">
        <div class="two wide column">
          <img class="ui small image middle" src="/img/skcc.png" alt="Suankularb Computer Club">
        </div>
        <div class="twelve wide column middle">
          <p>
            <br>
            ชุมนุมคอมพิวเตอร์ โรงเรียนสวนกุหลาบวิทยาลัย<br />
            อาคารสวนกุหลาบรำลึก (อาคาร 6) ชั้น 3<br />
            88 ถนนตรีเพชร แขวงวังบูรพาภิรมย์ เขตพระนคร กรุงเทพมหานคร 10200
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>
