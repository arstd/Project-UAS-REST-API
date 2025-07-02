<?php
require '../config/database.php';

$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'];
$password = md5($data['password']);

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->execute([$username, $password]);
$user = $stmt->fetch();

if ($user) {
    $token = bin2hex(random_bytes(16));
    $pdo->prepare("UPDATE users SET token = ? WHERE id = ?")->execute([$token, $user['id']]);
    echo json_encode(["token" => $token]);
} else {
    http_response_code(401);
    echo json_encode(["message" => "Login gagal"]);
}
?>