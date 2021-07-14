<?php
if(isset($_SESSION['loginn'])){
if(!isset($_REQUEST['itemid']) || !is_numeric($_REQUEST['itemid']) ){
    echo "<div class='alert alert-danger text text-center mx-auto'>Please enter a valid ID.</div>";
}else {
   if(!isset($_POST['answer'])){
       $itemid = sanitizeString($_REQUEST['itemid']);
       $item = Item::findItem($itemid);

       if(isset($item)){
           echo <<<_FORMUPDATE
<div class="card m-2">
       <div class="card-body">
        <form action="" name="itemEdit" method="post">
            <div class="form-group row mx-0">
                <label for="itemid" class="col-sm-4 col-form-label">Item ID</label>
                <input type="text" name="itemid" id="itemid" class="form-control col-sm-8" value="$item->itemid" disabled>
            </div>


            <div class="form-group row mx-0">
                <label for="name" class="col-sm-4 col-form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control col-sm-8" value="$item->name">
            </div>


            <div class="form-group row mx-0">
                <label for="description" class="col-sm-4 col-form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control col-sm-8" value="$item->description">
            </div>

            <div class="form-group row mx-0">
                <label for="resaleprice" class="col-sm-4 col-form-label">Resale price</label>
                <input type="text" name="resaleprice" id="resaleprice" class="form-control col-sm-8" value="$item->resaleprice">
            </div>

            <div class="form-group row mx-0">
                <label for="winbidder" class="col-sm-4 col-form-label">Winbidder</label>
                <input type="tel" name="winbidder" id="winbidder" class="form-control col-sm-8" value="$item->winbidder">
            </div>

            <div class="form-group row mx-0">
                <label for="winprice" class="col-sm-4 col-form-label">Winprice</label>
                <input type="tel" name="winprice" id="winprice" class="form-control col-sm-8" value="$item->winprice">
            </div>

            <input type="submit" name="answer" value="Update item" class="btn btn-warning btn-block">
            <input type="submit" name="answer" value="Cancel" class="btn btn-secondary btn-block">
            <input type="hidden" name="itemid" value="$itemid">

        </form>
    </div>
    </div>
_FORMUPDATE;
       }else{
           echo "<div class='alert alert-danger text text-center mx-auto'>Not a valid item ID. Enter a valid ID or <a class='btn btn-outline-danger' href='iindex.php?content=listitems'>Go to the items List</a></div>";
       }

   }elseif (isset($_POST['answer'])) {
       $itemid = sanitizeString($_POST['itemid']);
       if ($_POST['answer'] == "Update item") {
        $item = Item::findItem($itemid);
        $item->name = sanitizeString($_POST['name']);
        $item->description = sanitizeString($_POST['description']);
        $item->resaleprice = sanitizeString($_POST['resaleprice']);
        $item->winbidder = sanitizeString($_POST['winbidder']);
        $item->winprice = sanitizeString($_POST['winprice']);
        $result = $item->updateItem();
        if ($result) {
            echo "<div class='alert alert-success text text-center mx-auto'>Item $itemid updated.</div><a class='btn btn-outline-success' href='iindex.php?content=listitems'>Items List</a>";
        } else {
            echo "<div class='alert alert-danger text text-center mx-auto'>Problem updating item $itemid .</div><a class='btn btn-outline-success' href='iindex.php?content=updateitem'>Try again</a>";
        }
    } elseif ($_POST['answer'] == "Cancel") {
        echo "<div class='alert alert-success text text-center mx-auto'>Update Canceled for item $itemid .</div><a class='btn btn-outline-success' href='iindex.php?content=listitems'>Items List</a>";
    }
}
}
}else{
    header('Location: iindex.php');
}
?>