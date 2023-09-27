<?php
$mysqli = new mysqli("db", "user", null, "fumo");
$result = $mysqli->query("DELETE FROM fumos LIMIT 1");
?>
<script>
    window.onload = () => window.location.href = '/index.php';
</script>