<?php
require_once __DIR__ . '../../../../config/db.php';

header("Content-Type: application/json");

$stmt = $conn->query("SELECT COUNT(*) as sales_value, AVG(sales) as sales_value FROM sales_data");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);


// SELECT COUNT(*) AS total_employees, AVG(salary) AS average_salary
// FROM employees;

?>