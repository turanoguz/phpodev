<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// session değişkenlerini sil
session_unset();

// oturumu kapat
session_destroy();
header("location: index.php");
?>
<hr>

</body>
</html>