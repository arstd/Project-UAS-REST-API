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
    echo json_encode(["message" => "NIM mahasiswa diperlukan untuk melakukan operasi ini"]);
    exit;
}

$stmt = $pdo->prepare("DELETE FROM students WHERE nim = ?");
$stmt->execute([$id]);

echo json_encode(["message" => "Data mahasiswa dihapus"]);
?>