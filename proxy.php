<?php
// กำหนด URL ของ API
$api_url = 'http://173.249.21.123:8009/get-smartcard';

// ดึงข้อมูลที่ส่งมาในคำขอ
$data = json_decode(file_get_contents('php://input'), true);

// ตั้งค่าหัวข้อ Content-Type เป็น JSON
header('Content-Type: application/json');

// ส่งคำขอ POST ไปยัง API พร้อมกับข้อมูลที่ส่งมา
$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-Type: application/json',
        'content' => json_encode($data)
    )
);

// ส่งคำขอไปยัง API และรับ Response
$response = file_get_contents($api_url, false, stream_context_create($options));

// ส่ง Response กลับไปยังผู้ใช้
echo $response;
?>
