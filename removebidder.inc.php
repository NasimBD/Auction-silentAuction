<?php
if(isset($_SESSION['loginn'])){
if(isset($_POST['bidderid']) && strlen(trim($_POST['bidderid']))!=0) {
    $bidderid = sanitizeString($_POST['bidderid']);
    $bidder = Bidder::findBidder($bidderid);
    $result = $bidder->removeBidder();
    if($result){
        echo "<div class='alert alert-success text text-center mx-auto'>Successfully deleted bidder with ID $bidderid.</div>";
    }else{
        echo "<div class='alert alert-danger text text-center mx-auto'>Deletion of bidder with ID $bidderid was unsuccessful.</div><a href='iindex.php?content=listbidders' class='btn btn-warning'>Select a bidder</a>";
    }
}else{
    echo "<div class='alert alert-warning text text-center mx-auto'>You have not selected a valid bidder. Please select one. </div><a href='iindex.php?content=listbidders' class='btn btn-warning'>Select a bidder</a>";
}
}else{
    header('Location: iindex.php');
}
?>

