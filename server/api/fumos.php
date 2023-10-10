<?php
header("Content-Type: application/json");

$mysqli = new mysqli("db", "user", "password", "fumo");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['fumo_id'])) {
        $fumo_id = $mysqli->real_escape_string($_GET['fumo_id']);
        $query = "SELECT * FROM fumos WHERE fumo_id = $fumo_id";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo json_encode(["message" => "No fumo found for the specified ID"]);
        }
    } else {
        echo json_encode(["message" => "Invalid request. Please provide a fumo_id."]);
    }
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные в формате JSON из тела запроса
    $json_data = file_get_contents("php://input");

    // Декодируем JSON данные в массив PHP
    $data = json_decode($json_data, true);

    // Проверяем, удалось ли декодировать JSON данные
    if ($data === null) {
        echo json_encode(["message" => "Invalid JSON data provided"]);
    } else {
        if(isset($data['name']) && isset($data['cost'])) {
			$name = $mysqli->real_escape_string($data['name']);
			$cost = $mysqli->real_escape_string($data['cost']);

			$query = "INSERT INTO fumos (name, cost) VALUES ('$name', '$cost')";

			if ($mysqli->query($query)) {
				echo json_encode(["message" => "Fumo added successfully"]);
			} else {
				echo json_encode(["message" => "Error adding fumo"]);
			}
		} else {
			echo json_encode(["message" => "Invalid data provided"]);
		}
    }
}

else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if(isset($_GET['fumo_id']) && isset($data['name']) && isset($data['cost'])) {
        $fumo_id = $mysqli->real_escape_string($_GET['fumo_id']);
        $name = $mysqli->real_escape_string($data['name']);
        $cost = $mysqli->real_escape_string($data['cost']);
        
        $query = "UPDATE fumos SET name='$name', cost='$cost' WHERE fumo_id = $fumo_id";
        
        if ($mysqli->query($query)) {
            echo json_encode(["message" => "Fumo updated successfully"]);
        } else {
            echo json_encode(["message" => "Error updating fumo"]);
        }
    } else {
        echo json_encode(["message" => "Invalid data provided"]);
    }
}
else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_GET['fumo_id'])) {
        $fumo_id = $mysqli->real_escape_string($_GET['fumo_id']);
		$delete_associations_query = "DELETE FROM fumo_shop_association WHERE fumo_id = $fumo_id";
        $mysqli->query($delete_associations_query);
        $query = "DELETE FROM fumos WHERE fumo_id = $fumo_id";
        $mysqli->query($query);
        echo json_encode(["message" => "Fumo deleted successfully"]);
    } else {
        echo json_encode(["message" => "Invalid request. Please provide a fumo_id."]);
    }
}


$mysqli->close();
?>
