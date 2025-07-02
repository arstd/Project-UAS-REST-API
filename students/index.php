<?php
require '../config/database.php';
require '../middleware/auth.php';

$user = auth($pdo);
if (!$user) {
    http_response_code(401);
    echo json_encode(["message" => "Admin unauthorized"]);
    exit;
}

$data = $pdo->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
?>