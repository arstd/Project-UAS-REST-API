<?php
require '../config/database.php';
require '../middleware/auth.php';

$user = auth($pdo);
if (!$user) {
    http_response_code(401);
    echo json_encode(["message" => "Admin unauthorized"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$stmt = $pdo->prepare("INSERT INTO students (nim, name, email, phone, alamat) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$data['nim'], $data['name'], $data['email'], $data['phone'], $data['alamat']]);

echo json_encode(["message" => "Data mahasiswa ditambahkan"]);
?>