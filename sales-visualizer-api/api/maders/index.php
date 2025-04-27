<?php
require_once __DIR__ . '/../../config/db.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Access-Control-Max-Age: 86400'); // 24 hours
header("Content-Type: application/json");

$stmt = $conn->query("SELECT * FROM sales_data ORDER BY sale_date");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);



?>