<?php
$mysqli = new mysqli("db", "user", "password", "fumo");
$result = $mysqli->query("INSERT INTO fumos (name, cost) VALUES ('Cirno', 9)");
?>
<script>
    window.onload = () => window.location.href = '/index.php';
</script>