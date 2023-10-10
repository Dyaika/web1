<?php
$mysqli = new mysqli("db", "user", "password", "fumo");
$result = $mysqli->query("DELETE FROM fumos LIMIT 1");
?>
<script>
    window.onload = () => window.location.href = '/index.php';
</script>