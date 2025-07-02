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

$stmt = $pdo->prepare("SELECT * FROM students WHERE nim = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($data) {
    echo json_encode($data);
} else {
    http_response_code(404);
    echo json_encode(["message" => "Data mahasiswa tidak ditemukan"]);
}
?>