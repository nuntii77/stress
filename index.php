<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ระบบติดตามสภาวะความเครียดของนิสิตคณะเทคโนโลยีสารสนเทศและการสื่อสาร มหาวิทยาลัยพะเยา</title>
  <meta name="description" content="มุ่งเน้นพัฒนาคุณภาพของนิสิต เพื่อสุขภาพจิตที่ดี" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style copy.css">

 
</head>
<body>
    <!-- Header -->
  <header>
    <div class="container nav" role="navigation" aria-label="เมนูหลัก">
      <a href="#home" class="logo" aria-label="ไปหน้าแรก">
        <span class="logo-mark" aria-hidden="true">
          <img src="รูปภาพ/img/faculty-symbol-01.png" alt="โลโก้ 1">
        </span>
        <span>ระบบติดตามสภาวะความเครียดของนิสิตคณะเทคโนโลยีสารสนเทศและการสื่อสาร มหาวิทยาลัยพะเยา</span>
      </a>
      <nav class="nav-links" aria-label="ลิงก์นำทาง">
        <a href="#about">เกี่ยวกับ</a>
        <a href="#assessment">แบบประเมินความเครียด</a>
        <a href="#teachers">อาจารย์ที่ปรึกษา</a>
        <a href="#contact" >ติดต่อ</a>
        <a href="student.html"> 
        <span class="logo-mark" aria-hidden="true">
          <img src="รูปภาพ/img/student.png" alt="โลโก้ 2"></a>
        </span> 
        <a href="logout.php" >ลงชื่อออก</a>
      </nav>
      <button class="menu-btn" aria-label="เปิดเมนู" id="menuBtn">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>

      </button>
    </div>
    <div class="mobile-menu container hidden" id="mobileMenu">
      <a href="#about">เกี่ยวกับ</a>
      <a href="#assessment">แบบประเมินความเครียด</a>
      <a href="#teachers">อาจารย์ที่ปรึกษา</a>
      <a href="#contact">ติดต่อ</a>
      <a href="student.html"> 
      <span class="logo-mark" aria-hidden="true">
        <img src="รูปภาพ/img/student.png" alt="โลโก้ 2"></a>
      </span>
      <a href="logout.php" >ลงชื่อออก</a>
    </div>
  </header>
 
  <!-- Banner Slider -->
<section id="banner">
  <div class="slider">
    <div class="slide">
      <img src="รูปภาพ/img/pngtree-blue-sky-white-clouds-splashes-of-watercolor-background-skywhite-cloudsblue-sky-image_87892.jpg" alt="แบนเนอร์ 1">
      <div class="caption">
        <h2>ยินดีต้อนรับสู่เว็บไซต์ของเรา</h2>
      </div>
    </div>
  </div>
</section>
 
 
 
  <!-- Hero -->
  <section class="hero" id="home">
    <div class="container hero-inner">
      <div>
        <span class="badge"> คุณภาพนิสิต </span>
        <h1>ระบบติดตามสภาวะความเครียด <span class="accent">ของนิสิตคณะเทคโนโลยีสารสนเทศและการสื่อสาร มหาวิทยาลัยพะเยา</span></h1>
        <p>มุ่งเน้นพัฒนาคุณภาพของนิสิต เพื่อสุขภาพจิตที่ดี</p>
        <div class="hero-actions">
          <a href="#assessment" class="hero-cta">แบบประเมินความเครียด</a>

        </div>

      </div>
      <div class="hero-graphic">
        <div class="hero-card">
          <div class="stat">
            <span class="logo-mark" aria-hidden="true">
                <img src="รูปภาพ/img/networking.png" alt="โลโก้ 2"></a>
              </span>
              <div>
                <strong>1,250+</strong><div class="muted">นิสิตทั้งหมด</div></div></div>
        </div>
        
          <div class="hero-card">
            <div class="stat">
              <span class="logo-mark" aria-hidden="true">
                <img src="รูปภาพ/img/smile-icon.png" alt="โลโก้ 2"></a>
              </span>
            <div>
              <strong>98%</strong><div class="muted">นิสิตที่ยู่ในระดับปกติ</div></div></div>
          </div>
      
          <div class="hero-card">
            <div class="stat">
              <span class="logo-mark" aria-hidden="true">
                <img src="รูปภาพ/img/neutral-icon.png" alt="โลโก้ 2"></a>
              </span>
              <div>
                <strong>98%</strong><div class="muted">นิสิตที่ยู่ในระดับมีความเสี่ยง</div></div></div>
          </div>
          <div class="hero-card">
            <div class="stat">
              <span class="logo-mark" aria-hidden="true">
                <img src="รูปภาพ/img/sad.png" alt="โลโก้ 2"></a>
              </span>
              <div>
                <strong>98%</strong><div class="muted">นิสิตที่ยู่ในระดับวิกฤต</div></div></div>
          </div>
        </div>
        
      </div>
    </div>
  </section>
 
  <!-- About -->
  <section id="about">
    <div class="container">
      <div class="section-head">
        <div>
          <h2>ความเครียด</h2>
          <!--<p>ความเครียดคืออะไร</p>-->
        </div>
        <!--<a class="btn" href="#contact">เยี่ยมชมสถานศึกษา</a> -->
      </div>
      <div class="grid grid-3">
        <div class="card">
          <h3>ความเครียดคืออะไร</h3>
          <ul>
          <p class="muted">
ความเครียด เป็นกลไกตามธรรมชาติของมนุษย์ เพื่อใช้ตอบสนองต่อสถานการณ์ยากท้าทาย หรืออันตราย เพื่อเตรียมรับมือกับสิ่งที่จะเจอ
ความเครียด คือ ภาวะที่ไม่สบายใจหรือความกังวล ที่เกิดขึ้นเมื่อเผชิญสถานการณ์ที่ไม่ตรงกับความรู้สึกหรือความคาดหวัง เช่น เมื่อต้องฝืนทำสิ่งที่ไม่ชอบ หรือไม่ได้ทำสิ่งที่อยากทำ นี่คือความเครียด
ความเครียดจึงเป็นเรื่องส่วนบุคคล ในสายตาคนทั่วไป งานนั้นอาจน่าเบื่อ แต่ถ้าคนๆ นั้นรู้สึกชอบหรือสนุกที่จะทำ งานนั้นจะไม่เป็นความเครียด</p>
          </ul>
        </div>
        <div class="card">
          <h3>ประเภทของความเครียด</h3>
          
          <ul>
            <p class="muted">
            ประเภทของความเครียดแบ่งเป็น 2 แบบตามระยะเวลา คือ </br>
1. ความเครียดระยะสั้นหรือฉับพลัน เช่น ทะเลาะกับเพื่อน คนใกล้ชิดเสียชีวิตสอบตก การหย่าร้อง </br>
2. ความเครียดเรื้อรังและสะสม เมื่อเจอสถานการณ์ที่ทำให้เครียดอยู่ซ้ำๆ เช่น การเรียน หรือทำงานที่มีความกดดันสูง ปัญหาการเงิน
            </p>  
          </ul>
        
        </div>
        <div class="card">
          <h3>ความเครียดส่งผลต่อร่างกายและสมองอย่างไร</h3>
          <ul>

          <p class="muted">
            
ความเครียดส่งผลต่อสมอง เกิดการกระตุ้นระบบประสาทซิมพาเทติกและกระตุ้นการหลั่งคอร์ติซอล (ฮอร์โมนความเครียด) จากต่อมหมวกไต ให้อวัยวะต่างๆ ตื่นตัว เพื่อเตรียมร่างกายเข้าสู่ภาวะพร้อมสู้หรือหนี

คือ ใจเต้นรัว ความดันเลือดสูง หลอดเลือดหดตัว หายใจถี่และสั้น ซึ่งถือเป็นอาการผิดปกติของร่างกาย หากอยู่ในภาวะเครียดนานๆ ร่างกายและจิตใจจะได้รับผลกระทบจากอาการผิดปกติเหล่านี้

ความเครียดที่กระทบกระเทือนอารมณ์รุนแรงส่งผลทำให้สมองฝ่อได้ โดยเฉพาะสมองส่วนอะมิกดาลา (อารมณ์ดิบ) และไฮโพทาลามัส (ศูนย์รวมสัญชาตญาณ) เกิดเป็นโรคเครียดหลังผ่านเหตุการณ์ที่กระทบจิตใจรุนแรง</p>
            </ul>
        </div>
      </div>
    </div>
  </section>
 

 
  <!-- Assessment -->
  <section id="assessment">
    <div class="container">
      <div class="section-head">
        <div>
          <h2>แบบประเมินความเครียด</h2>
          <p>จากแบบวัดความเครียด กรมสุขภาพจิต (SPST - 20)</p>
          
        </div>
            <a class="btn" href="assessment.php">เริ่มทำแบบประเมิน</a>
      </div>
      <div class="grid grid-2">
        <div class="card">
          <h3>เกณฑ์วัดระดับความเครียด</h3>
          <div class="timeline">
            <div class="step"><strong>ระดับความเครียด ๑ </strong><div class="muted">หมายถึง ไม่รู้สึกเครียด</div></div>
            <div class="step"><strong>ระดับความเครียด ๒ </strong><div class="muted">หมายถึง รู้สึกเครียดเล็กน้อย</div></div>
            <div class="step"><strong>ระดับความเครียด ๓ </strong><div class="muted">หมายถึง รู้สึกเครียดปานกลาง</div></div>
            <div class="step"><strong>ระดับความเครียด ๔ </strong><div class="muted">หมายถึง รู้สึกเครียดมาก</div></div>
            <div class="step"><strong>ระดับความเครียด ๕ </strong><div class="muted">หมายถึง รู้สึกเครียดมากที่สุด</div></div>
          </div>
        </div>
        <div class="card">
          <h3>เกณฑ์การแปลผล</h3>
          <h4>คะแนนรวม มีได้ตั้งแต่ 0-62 ขึ้นไป</h4>
          <ul>
            <li>ระดับคะแนน       0 – 23
	ท่านมีความเครียดอยู่ในระดับเล็กน้อยและหายได้ในระยะเวลาสั้น ๆ ความเครียดในระดับนี้ถือว่ามีประโยชน์ในการดำเนินชีวิตประจำวัน เป็นแรงจูงใจในที่นำไปสู่ความสำเร็จในชีวิตได้        
</li>
            <li>ระดับคะแนน       24 - 41  
	ท่านมีความเครียดในระดับปานกลางเกิดขึ้นได้ในชีวิตประจำเนื่องจากมีสิ่งคุกคามหรือ เหตุการณ์ที่ทำให้เครียด อาจรู้สึกวิตกกังวลหรือกลัว ถือว่าอยู่ในเกณฑ์ปกติ ความเครียดระดับนี้ไม่ก่อให้เกิดอันตรายหรือเป็นผลเสียต่อการดำเนินชีวิต  
</li>
            <li>ระดับคะแนน       42 – 61    
	ท่านมีความเครียดในระดับสูง เป็นระดับที่ท่านได้รับความเดือดร้อนจากสิ่งต่าง ๆ หรือเหตุการณ์ รอบตัวทำให้วิตกกังวล กลัว จัดการปัญหานั้นไม่ได้ ส่งผลต่อการใช้ชีวิตประจำวัน 
	ควรคลายเครียดด้วยวิธีง่าย ๆ คือ การฝึกหายใจ พูดคุยระบายความเครียดกับผู้ไว้วางใจ หาสาเหตุหรือปัญหาที่ทำให้เครียดและหาวิธีแก้ไข หากท่านไม่สามารถจัดการคลายเครียดด้วยตนเองได้ ควรปรึกษากับผู้ให้การปรึกษาในหน่วยงานต่าง ๆ
</li>
          
          <li>ระดับคะแนน       62 คะแนนขึ้นไป     
ท่านมีความเครียดในระดับรุนแรง เป็นความเครียดระดับสูงที่เกิดต่อเนื่องหรือท่านกำลังเผชิญกับวิกฤตของชีวิต ความเครียดระดับนี้ส่งผลทำให้เจ็บป่วยทางกายและสุขภาพจิต ชีวิตไม่มีความสุข ความคิดฟุ้งซ่าน ยับยั้งอารมณ์ไม่ได้
หากปล่อยไว้จะเกิดผลเสียทั้งต่อตนเองและคนใกล้ชิด ควรได้รับการช่วยเหลือจากผู้ให้การปรึกษาอย่างรวดเร็ว จากผู้ให้การปรึกษาในหน่วยงานต่าง ๆ
</li>
        
        </ul>
          <p class="muted">* ข้อมูลจากกรมสุขภาพจิต (SPST - 20)</p>
        </div>
      </div>
    </div>
  </section>
 
    
 
 
 
 
  <!-- Teachers -->
<section id="teachers">
  <div class="container">
    <div class="section-head">
      <div>
        <h2>อาจารย์ที่ปรึกษา</h2>
        <p></p>
      </div>
    </div>
    <div class="grid grid-3">
      <div class="card teacher">
        <div class="avatar">
          <img src="รูปภาพ/img/pic-71-202312121702352961_24818_44.jpg" alt="อาจารย์ราเชนทร์">
        </div>
        <div>
          <h3>นายราเชนทร์ สุขม่วง</h3>
          <p class="muted">ประธานหลักสูตร <br/> สาขาคอมพิวเตอร์กราฟิกและมัลติมีเดีย</p>
        </div>
      </div>
      <div class="card teacher">
        <div class="avatar">
          <img src="รูปภาพ/img/pic-85-202312121702353683_90414_44.jpg" alt="อาจารย์สุพรรณ์">
        </div>
        <div>
          <h3>นางสาวสุพรรณ์ ทองเพชร</h3>
          <p class="muted">ประธานหลักสูตร <br/> สาขาธุรกิจดิจิทัล</p>
        </div>
      </div>
      <div class="card teacher">
        <div class="avatar">
          <img src="รูปภาพ/img/pic-90-202405091725502960_80786_44.png" alt="อาจารย์เสถียร">
        </div>
        <div>
          <h3>ดร.เสถียร หันตา</h3>
          <p class="muted">ประธานหลักสูตร <br/> สาขาเทคโนโลยีสารสนเทศ</p>
        </div>
      </div>
      <div class="card teacher">
        <div class="avatar">
          <img src="รูปภาพ/img/pic-100-202326121703559001_56453_44.png" alt="อาจารย์บุญศิริ">
        </div>
        <div>
          <h3>ผู้ช่วยศาสตราจารย์ ดร.บุญศิริ สุขพร้อมสรรพ์</h3>
          <p class="muted">ประธานหลักสูตร <br/> สาขาภูมิสารสนเทศศาสตร์</p>
        </div>
      </div>
      <div class="card teacher">
        <div class="avatar">
          <img src="รูปภาพ/img/pic-111-202312121702354263_69993_44.jpg" alt="อาจารย์วรกฤต">
        </div>
        <div>
          <h3>นายวรกฤต แสนโภชน์</h3>
          <p class="muted">ประธานหลักสูตร <br/> สาขาวิทยาการคอมพิวเตอร์</p>
        </div>
      </div>
      <div class="card teacher">
        <div class="avatar">
          <img src="รูปภาพ/img/pic-106-202405091725503278_73389_44.png" alt="อาจารย์กนกวรรธน์">
        </div>
        <div>
          <h3>ดร.กนกวรรธน์ เซี่ยงเจ็น</h3>
          <p class="muted">ประธานหลักสูตร <br/> สาขาวิทยาการข้อมูลและการประยุกต์</p>
        </div>
      </div>
      <div class="card teacher">
        <div class="avatar">
          <img src="รูปภาพ/img/pic-115-202312121702354360_19099_44.jpg" alt="อาจารย์นราศักดิ์">
        </div>
        <div>
          <h3>ดร.นราศักดิ์ บุญเทพ</h3>
          <p class="muted">ประธานหลักสูตร <br/> สาขาวิศวกรรมคอมพิวเตอร์</p>
        </div>
      </div>
      <div class="card teacher">
        <div class="avatar">
          <img src="รูปภาพ/img/pic-132-202312121702355376_85506_44.jpg" alt="อาจารย์อภิวัฒน์">
        </div>
        <div>
          <h3>ดร.อภิวัฒน์ บุตรวงค์</h3>
          <p class="muted">ประธานหลักสูตร <br/> สาขาวิศวกรรมซอฟต์แวร์</p>
        </div>
      </div>

    </div>
  </div>
</section>
 
 
  
 

  <!-- Contact -->
  <section id="contact">
    <div class="container">
      <div class="section-head">
        <div>
          <h2>ติดต่อ</h2>

        </div>
      </div>
      <div class="grid grid-2">
        
        <div class="card">
          <h3>ข้อมูลติดต่อ</h3>
          <p>สำนักงานคณะเทคโนโลยีสารสนเทศและการสื่อสาร มหาวิทยาลัยพะเยา <br/> เปิดทำการ จันทร์–ศุกร์ 08:30–16:30 น.</p>
          <p class="muted">คณะเทคโนโลยีสารสนเทศและการสื่อสาร อาคารเทคโนโลยีสารสนเทศและการสื่อสาร <br/> 19 ม.2 ต.แม่กา อ.เมืองพะเยา จ.พะเยา 56000 มหาวิทยาลัยพะเยา</p>
          <p class="muted">โทร : 054-466-666 ต่อ 2319 หรือ 2326 <br/>อีเมล : ict@up.ac.th</p>
        </div>
      </div>
    </div>
  </section>
 
 
 

  <!-- Footer -->
  <footer>
    <div class="container footer-grid">
      <div>
        <div class="logo" style="color:#fff">
          <span class="logo-mark" aria-hidden="true">
           <img src="รูปภาพ/img/faculty-symbol-01.png" alt="โลโก้ 1">
          </span>
          <strong>ระบบติดตามสภาวะความเครียด ของนิสิตคณะเทคโนโลยีสารสนเทศและการสื่อสาร มหาวิทยาลัยพะเยา</strong>
        </div>
        <p class="muted" style="margin-top:10px">มุ่งเน้นพัฒนาคุณภาพของนิสิต เพื่อสุขภาพจิตที่ดี</p>
      </div>
      <div>
        
      </div>
      <div>
        <h4>ติดต่อ</h4>
        <ul>
          <li>054-466-666 ต่อ 2319 หรือ 2326</li>
          <li>ict@up.ac.th</li>คณะเทคโนโลยีสารสนเทศและการสื่อสาร
          <li>จ.-ศ. 08:30–16:30 น.</li>
        </ul>
      </div>
    </div>
    <div class="container copyright">© <span id="year"></span> ระบบติดตามสภาวะความเครียด ของนิสิตคณะเทคโนโลยีสารสนเทศและการสื่อสาร มหาวิทยาลัยพะเยา — สงวนลิขสิทธิ์</div>
  </footer>
 
  <a href="#home" class="floating-top" aria-label="กลับขึ้นด้านบน">⬆</a>
 
  <script>
    // ปีปัจจุบัน
    document.getElementById('year').textContent = new Date().getFullYear();
 
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(a=>{
      a.addEventListener('click', e=>{
        const target = document.querySelector(a.getAttribute('href'));
        if(target){ e.preventDefault(); target.scrollIntoView({behavior:'smooth', block:'start'}); }
      });
    });
 
    // Mobile menu toggle
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    menuBtn?.addEventListener('click', ()=>{
      mobileMenu.classList.toggle('hidden');
    });
 
    // Close mobile menu on link click
    mobileMenu?.querySelectorAll('a').forEach(link=>{
      link.addEventListener('click', ()=> mobileMenu.classList.add('hidden'));
    });
  </script>
 
  <script>
  const menuBtn = document.getElementById('menuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
 
  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
<script src="home.js"></script>


        

</body>
</html>