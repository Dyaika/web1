<?php
$mysqli = new mysqli("db", "user", null, "fumo");
$result = $mysqli->query("INSERT INTO fumos (name, cost) VALUES ('Cirno', 9)");
?>
<script>
    window.onload = () => window.location.href = '/index.php';
</script>