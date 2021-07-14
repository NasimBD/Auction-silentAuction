<?php
if(isset($_SESSION['loginn'])) {
    unset($_SESSION['loginn']);
}
header("Location: iindex.php");
?>