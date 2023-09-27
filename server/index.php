<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <style>
        #cringe a {
            width: 55px;
            overflow: hidden;
        }
        #cringe a:hover {
            width: 100%;
            transition: .5s;
        }
        table {
            height: 300px;
        }
    </style>
</head>
<body>
<h1 style="font-family: 'Comic Sans MS'; font-style: italic">мЯгКиЕ ИгРуШкИ</h1>
<div style="overflow-y: scroll; max-height: 300px">
<table>
    <tr><th>id</th><th>name</th><th>cost</th></tr>
<?php
$mysqli = new mysqli("db", "user", null, "fumo");
$result = $mysqli->query("SELECT * FROM fumos");
foreach ($result as $row){
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['cost']}</td></tr>";
}
?>
</table>
</div>
<div id="cringe" style="font-size: 60pt; display: flex; flex-direction: column">
<a href = "/create.php">Create</a>
<a href = "/update.php">Update</a>
<a href = "/delete.php">Delete</a>
</h1>
</body>
</html>