
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="author" content="Suankularb Computer Club">
  <meta name="description" content="การแข่งขันเขียนโปรแกรมแก้ปัญหาทางคอมพิวเตอร์
		ที่ทั้ง สนุก เร้าใจ แปลกใหม่ และตื่นเต้นตลอดทั้งการแข่งขัน
		ชิงเงินรางวัลมูลค่ารวมกว่า 6,000 บาท!!!">
  <meta property="og:title" content="Suankularb Olympiad in informatics 2017">
  <meta property="og:image" content="#">
  <meta property="og:description" content="สการแข่งขันเขียนโปรแกรมแก้ปัญหาทางคอมพิวเตอร์
		ที่ทั้ง สนุก เร้าใจ แปลกใหม่ และตื่นเต้นตลอดทั้งการแข่งขัน
		ชิงเงินรางวัลมูลค่ารวมกว่า 6,000 บาท!!!">
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
  <title>Suankularb Olympiad in Informatics 2017 : SKOI17</title>
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
    @include('google-analytics')
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
            <div class="middle aligned content">
             
            </div>
        </div>
      </div>
    </div>

    <div class="ui text container slideInUp animated">
      <img class="ui huge centered image zoomIn animated" src="/img/skoi.png" alt="Logo">
      <h1 class="ui inverted header slideInUp animated gold">
        Suankularb Olympiad in Informatics 2017
      </h1>
      <h2>การแข่งขันเขียนโปรแกรมคอมพิวเตอร์ภาษา C/C++ ระดับมัธยมศึกษา <br> โรงเรียนสวนกุหลาบวิทยาลัย 2017<br>วันที่ 7 มีนาคม 2560 ณ โรงเรียนสวนกุหลาบวิทยาลัย</h2>
      <p>
		การแข่งขันเขียนโปรแกรมแก้ปัญหาทางคอมพิวเตอร์
		ที่ทั้ง สนุก เร้าใจ แปลกใหม่ และตื่นเต้นตลอดทั้งการแข่งขัน
		ชิงเงินรางวัลมูลค่ารวมกว่า 6,000 บาท!!!
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
            <li><p>กำลังศึกษาอยู่ในระดับชั้นมัธยมศึกษาปีที่ 1 - 6 หรือเทียบเท่า</p></li>
            <li><p>ทีมละไม่เกิน 2 คน จากโรงเรียนเดียวกัน พร้อมอาจารย์ที่ปรึกษา</p></li>
            <li><p>แต่ละโรงเรียนสามารถส่งทีมเข้าร่วมการแข่งขันได้ไม่จำกัด</p></li>
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
          <ul class="ui list inverted">
            <li><p>ใช้ภาษา C/C++ ในการแข่งขันแก้โจทย์ปัญหา</p></li>
			<li><p>ผู้จัดการแข่งขันเตรียมคอมพิวเตอร์ไว้ให้ทีมละ 2 เครื่อง โดยมีโปรแกรม Dev-C++ 4.9.9.2 และ Code::Blocks 13.12</p></li>
            <li><p>มีการแข่งขัน 2 รอบ รอบละ 3 ชั่วโมง</p></li>
			<li><p>ใช้การตรวจผลระบบ Grader แบบ Complete Feedback (ตรวจแล้วรู้ผลเลย)</p></li>
            <li><p>ผู้เข้าแข่งขันสามารถนำคีย์บอร์ดหรือเมาส์ของตนเองมาใช้ได้</p></li>
            <li><p>สำหรับกฎกติกาเพิ่มเติมจะประกาศ ณ วันที่แข่งขัน</p></li>
          </ul>
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
                <td>ตั้งแต่วันนี้เป็นต้นไป - วันก่อนการแข่งขัน</td>
                <td>รับสมัครผู้เข้าร่วมการแข่งขัน</td>
              </tr>
              <tr>
                <td>7 มีนาคม 2560</td>
                <td>Suankularb Olympiad in Informatics 2017</td>
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
