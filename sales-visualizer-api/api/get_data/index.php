<?php
require_once __DIR__ . '../../../config/db.php';

header("Content-Type: application/json");

$stmt = $conn->query("SELECT * FROM sales_data ORDER BY sale_date");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);



?>