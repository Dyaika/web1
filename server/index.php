<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css"/>
<style>
        #cringe a {
	    color: white;
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
        body {
            margin: 0;
            padding: 0;
            background-color: rgba(255, 192, 203, 0);
        }

        header {
            background-color: #004C95;
            color: white;
            padding: 10px;
            text-align: center;
        }

        section {
            padding: 20px;
            margin: 20px;
            background-color: white);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #004C95;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<h1 style="font-family: 'Comic Sans MS'; font-style: italic">мЯгКиЕ ИгРуШкИ</h1>
<div style="overflow-y: scroll; max-height: 300px">
<table>
    <tr><th>fumo_id</th><th>name</th><th>cost</th></tr>
<?php
$mysqli = new mysqli("db", "user", "password", "fumo");
$result = $mysqli->query("SELECT * FROM fumos");
foreach ($result as $row){
    echo "<tr><td>{$row['fumo_id']}</td><td>{$row['name']}</td><td>{$row['cost']}</td></tr>";
}
?>
</table>
</div>
    <footer id="cringe">
        <a href="/shops.php">Магазины</a>
        <a href="/info.html">О нас</a>
        <a href="/delivery.html">Додоставка</a>
    </footer>
</body>
</html>