<?php

// 1. เริ่ม Session

session_start();

// 2. กำหนดค่าการเชื่อมต่อฐานข้อมูล

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "login_register";

// 2.1 เปิดการแสดงข้อผิดพลาด (สำหรับ Debug)

error_reporting(E_ALL);

ini_set('display_errors', 1);
// ----------------------------------------------------

// 💡 ส่วนที่ 1: ตรวจสอบและดึง Session ID

// ----------------------------------------------------

$current_user_id = null;

if (isset($_SESSION['id'])) {

    $current_user_id = $_SESSION['id'];

} else {

    // หากไม่พบ $_SESSION['id'] ให้หยุดการทำงานและแสดงข้อความล็อกอิน

    die("

        <div style='text-align: center; padding: 50px; border: 1px solid #ccc; border-radius: 8px; max-width: 400px; margin: 50px auto; background-color: white;'>

            <h2 style='color: #dc3545;'>❌ ไม่พบสถานะการล็อกอิน</h2>

            <p>กรุณาเข้าสู่ระบบใหม่อีกครั้งเพื่อดูผลการประเมิน</p>

            <a href='index.php' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>กลับสู่หน้าหลัก</a>

        </div>

    ");

}

// ----------------------------------------------------

// 💡 ส่วนที่ 2: เชื่อมต่อฐานข้อมูลและดึงข้อมูลของผู้ใช้ปัจจุบัน

// ----------------------------------------------------



$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}


// กำหนดชื่อคอลัมน์ Foreign Key เป็น 'id' ตามที่คุณยืนยัน

$user_id_column = 'id';



// 🎯 แก้ไข SQL: ดึงผลลัพธ์ล่าสุดของผู้ใช้ปัจจุบันเท่านั้น

$sql = "

    SELECT

        total_score,
        stress_level,
        created_at
    FROM
        spst_results
    WHERE
        {$user_id_column} = ? /* กรองด้วย ID ผู้ใช้ที่ล็อกอินอยู่ */
    ORDER BY
        created_at DESC /* เรียงตามวันที่สร้างล่าสุด */
    LIMIT 1

";



$stmt = $conn->prepare($sql);



if (!$stmt) {

    die("SQL Prepare Error: " . $conn->error);

}



// ผูกตัวแปร ($current_user_id)

$stmt->bind_param("i", $current_user_id);

$stmt->execute();

$result = $stmt->get_result();



// ดึงข้อมูลแถวเดียว

$row = $result->fetch_assoc();

$records_found = $result->num_rows > 0;



$stmt->close();

$conn->close();



// เตรียมตัวแปรสำหรับแสดงผล

$created_at = $records_found ? htmlspecialchars($row["created_at"]) : '--';
$total_score = $records_found ? htmlspecialchars($row["total_score"]) : '--';
$stress_level = $records_found ? htmlspecialchars($row["stress_level"]) : 'ไม่พบผลการประเมินล่าสุด';

// ----------------------------------------------------

// 💡 ส่วนที่ 3: HTML แสดงผลลัพธ์

// ----------------------------------------------------

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<title>Student - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
      <ul class="navbar-nav sidebar accordion" 
    id="accordionSidebar" 
    style="background-color: #d1ecf7; color: #000000;">

            <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex justify-content-center" href="index.php" 
   style="margin-top: 0; padding-top: 0;  padding-bottom: 10px;">
    <img src="รูปภาพ/img/faculty-symbol-01.png" alt="ICT Logo" style=" height: 60px;">
</a>
<a class="sidebar-brand d-flex justify-content-center" href="index.php" 
   style="margin-top: 0; padding-top: 0; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
   <br>
   กลับสู่หน้าหลัก
</a>




            
            </a>

            <!-- Heading -->
            
            

            <!-- Nav Item - Utilities Collapse Menu -->
           

        
        
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                            

                        <!-- Nav Item - Messages -->
                        
                                <!-- Counter - Messages -->
                                
                            </a>
                            <!-- Dropdown - Messages 
                            
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    
                                   
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    
                                   
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                   
                                   
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    
                                    <div>
                                        
                               
                            </div>
                            -->
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">S M</span>
                                <img class="img-profile rounded-circle"
                                    src="รูปภาพ/img/student.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="c:\Users\testadmin\Documents\65025299\student.html">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    ออกจากระบบ
                                </a>
                                
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-block align-items-center justify-content-between mb-4">
  <div class="h5 mb-0 font-weight-bold text-gray-900" style="font-size: 28px;">
    ผลคะแนนของท่าน
  </div>
</div>


                                        
<!-- แถวที่ 1 -->
<div class="row">
  <div class="col mb-4">
    <div class="card border-left-muted shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <!-- รูป -->
          <div class="col-auto">
            <img src="รูปภาพ/img/sad.png" alt="Smile Icon" 
                 style="width: 80px; height: 80px; margin-right: 30px;">
          </div>
          <div class="col" style="color: #000000ff;">
                 <strong>วันที่ทำล่าสุด:</strong>
                <span class="result-value"><?php echo $created_at; ?></span>
            </div>
            <div class="col" style="color: #000000ff;">
                <strong>คะแนนรวม:</strong>
                <span class="result-value"><?php echo $total_score; ?></span>
            </div> 
            <div class="col" style="color: #9ca3aa;">
                <strong>ระดับสภาวะความเครียด:</strong>

                <span class="result-value" style="color: <?php echo ($stress_level == 'ไม่พบผลการประเมินล่าสุด') ? '#6c757d' : '#dc3545'; ?>;">

                    <?php echo $stress_level; ?>

                </span>

            </div>

        </div>
 </div>
</div>
       <div class="row">
  <div class="col mb-4">
    <div class="card border-left-body shadow h-100 py-3">
      <div class="card-body">
        <div class="row no-gutters align-items-center">

          <!-- ข้อความตรงกลาง -->
          <div class="col" style="color: #9ca3aa;">
            <div class="col" style="text-align: center; color: #9ca3aa; padding-top: 20px;">

              <div class="mb-4">
                <span class="font-weight-bold text-light text-uppercase" 
                      style="background-color: #57a6f0; padding: 4px 10px; border-radius: 6px;">
                  คุณสามารถพบอาจารย์ที่ปรึกษาของสาขา ในเวลาทำการ 08.30 - 16.30 น.
                </span>
              </div>

              <div class="font-weight-bold text-secondary text-uppercase mb-1" style="margin-top: 15px;">
                หรืออีกช่องทางสามารถเข้ารับคำปรึกษาผ่าน FB : พักใจ มพ.
                กองพัฒนาคุณภาพนิสิตและนิสิตพิการ อาคารสงวนเสริมศรี
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>



    <button type="submit" class="submit-button" onclick="openPopup()">
    ขอรับคำปรึกษา
</button>

<div id="submitPopup" class="popup-overlay">

    <div class="popup-content">
        <h2>✅ ส่งข้อมูลสำเร็จ!</h2>
        
        <div class="popup-message">
            <p>ข้อมูลของคุณถูกบันทึกเรียบร้อยแล้ว</p>
        
        </div>
        
        <button class="close-button"  onclick="closePopup()">กลับสู่หน้าหลัก</button>
        
    </div>
</div>

<script>
    const popup = document.getElementById('submitPopup');

    function openPopup() {
        // แสดง Pop-up
        popup.style.display = 'flex';
    }

    function closePopup() {
        // 1. ซ่อน Pop-up ก่อน
        popup.style.display = 'none';
        
        // 2. *** ส่วนสำคัญที่ถูกเพิ่ม/แก้ไข ***
        // สั่งให้เบราว์เซอร์เปลี่ยนเส้นทาง (Redirect) ไปที่หน้า index.html
        window.location.href = 'index.php'; 
        // ถ้า index.html อยู่ในโฟลเดอร์เดียวกัน ก็ใช้ชื่อไฟล์ได้เลย
        // ถ้าต้องการกลับไปหน้าแรกสุดของเว็บไซต์เลย ให้ใช้ window.location.href = '/';
    }

    
    // ปิด Pop-up เมื่อคลิกนอกพื้นที่ Pop-up
    window.onclick = function(event) {
        if (event.target === popup) {
            window.location.href = 'score1.php';
        }
    }
</script>
    </div>
</body>

</html>