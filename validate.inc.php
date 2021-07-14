<?php
if(isset($_POST['submit'])){
    $userId = sanitizeString($_POST['userid']);
    $password = sanitizeString($_POST['password']);
    $db = new mysqli("localhost", "Nasim", "Germana1", "auction");

    $query = "SELECT * FROM admins WHERE userid = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s',$userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $resultArr = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($resultArr as $row){
        if(password_verify($password, $row['password'])){
            $name = $row['name'];
            echo "<h2>Welcome to AuctionHelper</h2>\n";
            $_SESSION['loginn'] = $name;
            header("Location: iindex.php");
        }else{
            echo "<h2>Sorry, login incorrect</h2>\n";
            echo "<a href=\"index.php\">Please try again</a>\n";
        }
    }
}