<?php
if(isset($_SESSION['loginn'])) {
    $bidderid = sanitizeString($_POST['bidderid']);
    if (!is_numeric($bidderid)) {
        echo "<div class='alert alert-danger text text-center mx-auto'>Please enter a valid ID.</div><a href='iindex.php?content=newbidder' class='btn btn-warning'>Try Again</a>";
    } else {
        $bidderid = sanitizeString($_POST['bidderid']);
        $firstname = sanitizeString($_POST['firstname']);
        $lastname = sanitizeString($_POST['lastname']);
        $address = sanitizeString($_POST['address']);
        $phone = sanitizeString($_POST['phone']);
        $bidder = new Bidder($bidderid, $firstname, $lastname, $address, $phone);
        $result = $bidder->saveBidder();
        if ($result) {
            echo "<div class='alert alert-success text text-center mx-auto'>Bidder with ID $bidderid successfully added.</div>";
        } else {
            echo "<div class='alert alert-danger text text-center mx-auto'>Sorry, there was a problem adding bidder with ID $bidderid .</div><a href='iindex.php?content=newbidder' class='btn btn-warning'>Try Again</a>";
        }
    }
}else{
    header('Location: iindex.php');
}
?>
