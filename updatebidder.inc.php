<?php
if(isset($_SESSION['loginn'])){
if(isset($_POST['updatebidder']) && isset($_POST['bidderid']) && strlen(trim($_POST['bidderid']))!=0) {
    $bidderid = sanitizeString($_POST['bidderid']);
    $bidder = Bidder::findBidder($bidderid);


    echo <<<_FORM1
<div class="card-body">
    <form name="bidder" action="iindex.php" method="post">
        <div class="form-group row mx-0">
            <label for="bidderid" class="col-sm-4 col-form-label">Bidder ID</label>
            <input type="text" name="bidderid" id="bidderid" class="form-control col-sm-8" value="$bidder->bidderid" disabled>
        </div>


        <div class="form-group row mx-0">
            <label for="lastname" class="col-sm-4 col-form-label">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control col-sm-8" value="$bidder->lastname">
        </div>


        <div class="form-group row mx-0">
            <label for="firstname" class="col-sm-4 col-form-label">First Name</label>
            <input type="text" name="firstname" id="firstname" class="form-control col-sm-8" value="$bidder->firstname">
        </div>


        <div class="form-group row mx-0">
            <label for="address" class="col-sm-4 col-form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control col-sm-8" value="$bidder->address">
        </div>

        <div class="form-group row mx-0">
            <label for="phone" class="col-sm-4 col-form-label">Phone</label>
            <input type="tel" name="phone" id="phone" class="form-control col-sm-8" value="$bidder->phone">
        </div>

        <input type="submit" name="answer" value="Update Bidder" class="btn btn-warning btn-block">
        <input type="submit" name="answer" value="Cancel" class="btn btn-secondary btn-block">
        
        <input type="hidden" name="bidderid" value="$bidderid"> //n.b.1
        <input type="hidden" name="content" value="changebidder">
    </form>
</div>
_FORM1;
}
}else{
header('Location: iindex.php');
}
?>

<script>
    $(document).ready(function () {
        $('form[name="bidder"]').find('#lastname').focus();
        $('form[name="bidder"]').find('#lastname').select();
    })
</script>
