<?php
function auth($pdo) {
    $headers = apache_request_headers();
    if (!isset($headers['Authorization'])) return false;

    $token = trim(str_replace("Bearer", "", $headers['Authorization']));
    $stmt = $pdo->prepare("SELECT * FROM users WHERE token = ?");
    $stmt->execute([$token]);
    return $stmt->fetch();
}
?>