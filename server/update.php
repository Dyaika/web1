<?php
$mysqli = new mysqli("db", "user", null, "fumo");
$result = $mysqli->query("UPDATE fumos SET cost=5000 WHERE COST='9'");
?>
<script>
    window.onload = () => window.location.href = '/index.php';
</script>