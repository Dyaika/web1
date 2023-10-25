<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    <h1 style="font-family: 'Comic Sans MS'; font-style: italic">Магазины</h1>
    <div class="scrollable-container">
        <table>
            <tr>
                <th>shop_id</th>
                <th>address</th>
                <th>opening_time</th>
                <th>closing_time</th>
            </tr>
            <?php
            $mysqli = new mysqli("db", "user", "password", "fumo");
            $result = $mysqli->query("SELECT * FROM shops");
            foreach ($result as $row){
                echo "<tr><td>{$row['shop_id']}</td><td>{$row['address']}</td><td>{$row['opening_time']}</td><td>{$row['closing_time']}</td></tr>";
            }
            ?>
        </table>
    </div>
    <footer id="cringe">
        <a href="/index.php">Игрушки</a>
        <a href="/info.html">О нас</a>
        <a href="/delivery.html">Додоставка</a>
    </footer>
</body>

</html>
