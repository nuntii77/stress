<?php
session_start();
// โค้ดนี้จะตรวจสอบว่าผู้ใช้ล็อกอินแล้ว (มี $_SESSION["user"]) หรือไม่
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit; // ควรเพิ่ม exit/die หลังจาก header
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
  <link rel="stylesheet" href="login3.css">

 
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            
            // 💡 แนะนำให้ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
            $sql = "SELECT id, password, user_type FROM users WHERE email = ?"; 
            
            // ใช้วิธีเดิมของคุณ:
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    
                    // 🔴 แก้ไข 1: หากยังไม่ได้เริ่ม Session ที่ด้านบนสุด ให้เริ่มใหม่ (แต่คุณเริ่มแล้ว)
                    // session_start(); 
                    
                    // 🔴 จุดสำคัญที่ต้องเพิ่ม: เก็บ ID ผู้ใช้ลงใน Session
                    $_SESSION["id"] = $user["id"]; 
                    
                    // 🔴 แก้ไข 2: ใช้ $_SESSION["user"] เพื่อบ่งบอกสถานะการล็อกอิน
                    $_SESSION["user"] = "yes"; 
                    
                    // 🔴 แก้ไข 3: เพิ่มเงื่อนไข redirect ตามสิทธิ์ (ถ้ามี)
                    
                    // หาก $user["user_type"] == 'teacher'
                    // header("Location: dashboard_teacher.php");
                    // else 
                    header("Location: index.php"); 
                    
                    die(); // ใช้ die() แทน die() 
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="absolute-centered">
                    <div class="logo">
        
                        <img src="รูปภาพ/img/faculty-symbol-01.png" alt="โลโก้ 1">
                    </div>
                </div>
                <h1>ยินดีต้อนรับเข้าสู่ระบบ</h1>
                <p>โปรดเข้าสู่ระบบเพื่อเริ่มใช้งาน</p>
        </div>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="login-btn">
            
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>