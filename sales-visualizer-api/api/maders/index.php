<?php
require_once __DIR__ . '/../../config/db.php';

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");


// Query the sales table
$sql = "SELECT * FROM sales_data ORDER BY sale_date";
$result = $conn->query($sql);

$sales_data = [];
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $sales_data[] = $row;
    }
}

// $stmt = $conn->query("SELECT * FROM sales_data ORDER BY sale_date");
// $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($data);


// Close connection
$conn->close();

// Return JSON response
echo json_encode([
    "status" => "success",
    "message" => "Sales data retrieved successfully",
    "data" => $sales_data
]);

?>

// possible code from CoPoilot

// header("Access-Control-Allow-Origin: *"); // Allows requests from any origin
// header("Content-Type: application/json; charset=UTF-8");


// // Query the sales table
// $sql = "SELECT * FROM sales";
// $result = $conn->query($sql);

// $sales_data = [];
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $sales_data[] = $row;
//     }
// }

// // Close connection
// $conn->close();

// // Return JSON response
// echo json_encode([
//     "status" => "success",
//     "message" => "Sales data retrieved successfully",
//     "data" => $sales_data
// ]);

