<?php
require '../config/database.php';
require '../middleware/auth.php';

$user = auth($pdo);

if ($user) {
    echo json_encode(["id" => $user['id'], "username" => $user['username'], "role" => $user['role']]);
} else {
    http_response_code(401);
    echo json_encode(["message" => "Token tidak valid"]);
}
?>