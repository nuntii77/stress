<?php
header('Content-Type: application/json');

// 1. ตั้งค่าการเชื่อมต่อฐานข้อมูล
// *** แก้ไขค่าเหล่านี้ตามการตั้งค่า MySQL ของคุณ ***
$servername = "localhost";
$username = "root"; // ชื่อผู้ใช้ default ของ XAMPP คือ root
$password = "";     // รหัสผ่าน default ของ XAMPP คือว่างเปล่า
$dbname = "login_register"; // ชื่อฐานข้อมูลที่คุณสร้างไว้ในขั้นตอนที่ 1

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

$sql = "
    SELECT 
        users.id,
        users.full_name,
        spst_results.total_score,
        spst_results.stress_level
    FROM 
        users
    INNER JOIN 
        spst_results 
    ON 
        users.id = spst_results.id 
       
    ORDER BY 
        spst_results.total_score DESC
"; 

// 2. รับข้อมูลที่ส่งมาจาก JavaScript (เป็น JSON)
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// ตรวจสอบว่าได้รับข้อมูลที่ต้องการหรือไม่
if (isset($data['total_score']) && isset($data['stress_level'])) {
    $score = $data['total_score'];
    $level = $data['stress_level'];

    // ป้องกัน SQL Injection
    $score = $conn->real_escape_string($score);
    $level = $conn->real_escape_string($level);

    // 3. เตรียมและดำเนินการคำสั่ง SQL (INSERT)
    $sql = "INSERT INTO spst_results (total_score, stress_level) VALUES ('$score', '$level')";

    if ($conn->query($sql) === TRUE) {
        // บันทึกสำเร็จ
        echo json_encode(['success' => true, 'message' => 'New record created successfully']);
    } else {
        // บันทึกไม่สำเร็จ
        echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . ' ' . $conn->error]);
    }
} else {
    // ข้อมูลไม่ครบ
    echo json_encode(['success' => false, 'message' => 'Invalid input data']);
}

// ปิดการเชื่อมต่อ
$conn->close();
?>