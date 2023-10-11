<?php
header("Content-Type: application/json");

$mysqli = new mysqli("db", "user", "password", "fumo");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['shop_id'])) {
        $shop_id = $mysqli->real_escape_string($_GET['shop_id']);
        $query = "SELECT * FROM fumo_shop_association INNER JOIN shops ON shops.shop_id=fumo_shop_association.shop_id INNER JOIN fumos ON fumos.fumo_id=fumo_shop_association.fumo_id WHERE fumo_shop_association.shop_id=$shop_id";
		/*"SELECT * FROM shops INNER JOIN fumo_shop_association ON shops.shop_id=fumo_shop_association.shop_id
INNER JOIN fumos ON fumo_shop_association.fumo_id=fumos.fumo_id	WHERE shops.shop_id = $shop_id";*/
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
			$arr = array();
			foreach ($result as $row) {
				$arr[$row['fumo_id']]= $row;
			}
			echo json_encode($arr);
        } else {
            echo json_encode(["message" => "No shops found for the specified ID"]);
        }
    } else {
        echo json_encode(["message" => "Invalid request. Please provide a shop_id."]);
    }
}


$mysqli->close();
?>
