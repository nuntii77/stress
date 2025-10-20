<?php
// 1. กำหนดค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register"; // ตรวจสอบให้แน่ใจว่า dbname ถูกต้อง

// 2. เปิดการแสดงข้อผิดพลาด
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 3. สร้างการเชื่อมต่อ (ใช้ค่าเดิม)
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // แสดงข้อผิดพลาดหากเชื่อมต่อไม่ได้
}

// 4. เตรียมคำสั่ง SQL สำหรับ JOIN Table และดึงข้อมูล
$sql = "
    SELECT 
        users.id, 
        users.full_name, 
        users.st_id,
        users.year,
        users.email,
        spst_results.created_at, 
        spst_results.stress_level,
        spst_results.total_score
    FROM 
        users
    INNER JOIN 
        spst_results 
    ON 
        users.id = spst_results.id 
    ORDER BY 
        spst_results.total_score DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการประเมินความเครียดรวม</title>
    <style>
        body { font-family: 'Noto Sans Thai', sans-serif; margin: 20px; background-color: #f4f4f9; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #007bff; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 ผลการประเมินความเครียดรวม (SPST-20)</h1>
        
        <?php
        // 5. ตรวจสอบว่ามีข้อมูลหรือไม่
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                    <th> email </th>
                    <th> รหัสนิสิต </th>
                    <th>Name</th>
                    <th> ชั้นปี</th>
                    <th>วันที่ทำล่าสุด</th>
                    <th>คะแนนรวม</th>
                    <th>ระดับสภาวะความเครียด</th>
                  </tr>";
            
            $counter = 1;
            // วนลูปแสดงข้อมูลทีละแถว
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["st_id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["full_name"]) . "</td>"; // ดึงจาก users.id 
                echo "<td>" . htmlspecialchars($row["year"]) . "</td>";
                echo "<td><strong>" . htmlspecialchars($row["created_at"]) . "</strong></td>"; // ดึงจาก spst_results.total_score
                echo "<td>" . htmlspecialchars($row["total_score"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["stress_level"]) . "</td>"; // ดึงจาก spst_results.stress_level
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align: center; color: #dc3545;'>ไม่พบข้อมูลผลการประเมิน</p>";
        }

        // 6. ปิดการเชื่อมต่อ
        $conn->close();
        ?>
        
    </div>
</body>
</html>
