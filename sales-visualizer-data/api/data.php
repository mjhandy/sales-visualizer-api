// api/users.php
<?php
require_once __DIR__ . '/../config/database.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        // Handle GET request (Retrieve Users)
        $stmt = $conn->query("SELECT * FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
        break;

    case 'POST':
        // Handle POST request (Create User)
        $data = json_decode(file_get_contents("php://input"));
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $data->name);
        $stmt->bindParam(':email', $data->email);
        if($stmt->execute()) {
            echo json_encode(['message' => 'User created successfully']);
        }
        break;

    case 'PUT':
        // Handle PUT request (Update User)
        $data = json_decode(file_get_contents("php://input"));
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $data->name);
        $stmt->bindParam(':email', $data->email);
        $stmt->bindParam(':id', $data->id);
        if($stmt->execute()) {
            echo json_encode(['message' => 'User updated successfully']);
        }
        break;

    case 'DELETE':
        // Handle DELETE request (Delete User)
        $data = json_decode(file_get_contents("php://input"));
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $data->id);
        if($stmt->execute()) {
            echo json_encode(['message' => 'User deleted successfully']);
        }
        break;

    default:
        http_response_code(405); // Method Not Allowed
        break;
}
?>
