<?php
require '../config/database.php';
require '../middleware/auth.php';

$user = auth($pdo);
if (!$user) {
    http_response_code(401);
    echo json_encode(["message" => "Admin unauthorized"]);
    exit;
}

$id = $_GET['nim'] ?? null;
if (!$id) {
    http_response_code(400);
    echo json_encode(["message" => "NIM mahasiswa diperlukan untuk operasi ini"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$stmt = $pdo->prepare("UPDATE students SET name = ?, email = ?, phone = ?, alamat = ?");
$stmt->execute([$data['name'], $data['email'], $data['phone'], $data['alamat']]);

echo json_encode(["message" => "Data mahasiswa diperbarui"]);
?>