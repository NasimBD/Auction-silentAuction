<?php
if(isset($_SESSION['loginn'])) {
    if (isset($_POST['bidderid']) && strlen(trim($_POST['bidderid'])) != 0) {
        $bidderid = sanitizeString($_POST['bidderid']);
        if ($_POST['answer'] == 'Update Bidder') {

            $bidder = Bidder::findBidder($bidderid);
            $bidder->bidderid = sanitizeString($_POST['bidderid']);
            $bidder->firstname = sanitizeString($_POST['firstname']);
            $bidder->lastname = sanitizeString($_POST['lastname']);
            $bidder->address = sanitizeString($_POST['address']);
            $bidder->phone = sanitizeString($_POST['phone']);
            $result = $bidder->updateBidder();

            if ($result) {
                echo "<div class='alert alert-success text text-center mx-auto'>Bidder $bidderid successfully updated.</div>";
            } else {
                echo "<div class='alert alert-danger text text-center mx-auto'>Sorry, updating Bidder $bidderid was unsuccessful.</div>";
            }
        } elseif ($_POST['answer'] == 'Cancel') {
            echo "<div class='alert alert-danger text text-center mx-auto'>Updating Bidder $bidderid canceled.</div>";
        }

    }else{
        echo "<div class='alert alert-danger text text-center mx-auto'>Please enter a valid ID.</div>";
    }
}else{
        header('Location: iindex.php');
    }
?>