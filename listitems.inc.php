<?php
if(isset($_SESSION['loginn'])){
    if($_REQUEST['content'] === 'removeitem'){
        $itemid = sanitizeString($_POST['itemid']);
        $item = Item::findItem($itemid);
        $result = $item->removeItem();
        if($result){
            echo "<div class='alert alert-success text text-center mx-auto p-4 font-weight-bold'>Item $itemid removed successfully.</div>";

        }else{
            echo "<div class='alert alert-danger text text-center mx-auto'>Sorry, problem removing item $itemid .</div>";

        }



    }elseif(isset($_POST['updateitem'])){
        if(isset($_POST['itemid'])){
            $itemid = sanitizeString($_POST['itemid']);
            $item = Item::findItem($itemid);

            echo <<<_FORMUPDATE
<div class="card m-2">
       <div class="card-body">
        <form action="" name="itemEdit" method="post">
            <div class="form-group row mx-0">
                <label for="itemidE" class="col-sm-4 col-form-label">Ttem ID</label>
                <input type="text" name="itemidE" id="itemidE" class="form-control col-sm-8" value="$item->itemid" disabled>
            </div>


            <div class="form-group row mx-0">
                <label for="nameE" class="col-sm-4 col-form-label">Name</label>
                <input type="text" name="nameE" id="nameE" class="form-control col-sm-8" value="$item->name">
            </div>


            <div class="form-group row mx-0">
                <label for="descriptionE" class="col-sm-4 col-form-label">Description</label>
                <input type="text" name="descriptionE" id="descriptionE" class="form-control col-sm-8" value="$item->description">
            </div>

            <div class="form-group row mx-0">
                <label for="resalepriceE" class="col-sm-4 col-form-label">Resale price</label>
                <input type="text" name="resalepriceE" id="resalepriceE" class="form-control col-sm-8" value="$item->resaleprice">
            </div>

            <div class="form-group row mx-0">
                <label for="winbidderE" class="col-sm-4 col-form-label">Winbidder</label>
                <input type="tel" name="winbidderE" id="winbidderE" class="form-control col-sm-8" value="$item->winbidder">
            </div>

            <div class="form-group row mx-0">
                <label for="winpriceE" class="col-sm-4 col-form-label">Winprice</label>
                <input type="tel" name="winpriceE" id="winpriceE" class="form-control col-sm-8" value="$item->winprice">
            </div>

            <input type="submit" name="answer" value="Update item" class="btn btn-warning btn-block">
            <input type="submit" name="answer" value="Cancel" class="btn btn-secondary btn-block">
            <input type="hidden" name="itemidE" value="$itemid">

        </form>
    </div>
    </div>
_FORMUPDATE;
        }else{
            echo '<p class="py-2 bg-warning text-danger font-weight-bold">Please select an item</p>';
        }

    }elseif(isset($_POST['answer'])){
        $itemid = $_POST['itemidE'];
        if($_POST['answer'] == "Update item"){
            $item = Item::findItem($itemid);
            $item->name = sanitizeString($_POST['nameE']);
            $item->description = sanitizeString($_POST['descriptionE']);
            $item->resaleprice = sanitizeString($_POST['resalepriceE']);
            $item->winbidder = sanitizeString($_POST['winbidderE']);
            $item->winprice = sanitizeString($_POST['winpriceE']);
            $result = $item->updateItem();
            if($result){
                echo "<div class='alert alert-success text text-center mx-auto'>Item $itemid updated.</div>";
            }else{
                echo "<div class='alert alert-danger text text-center mx-auto'>Problem updating item $itemid .</div>";
            }
        }elseif($_POST['answer'] == "Cancel"){
            echo "<div class='alert alert-success text text-center mx-auto'>Update Canceled for item $itemid .</div>";
        }
    }



    $items = Item::getItems();

    echo <<<_FORM1
    <form name="items"  method="post">
    <select name="itemid" size="7" class="custom-select my-2">       
_FORM1;
    foreach ($items as $item){
        $itemid = $item->itemid;
        $name = $item->name;
        echo "<option value='$itemid'>$itemid - $name</option>";
    }
    echo <<<_FORM2
    </select>
    <input type="submit" name="deleteitem" value="Delete Item" class="btn btn-danger my-1">
    <input type="submit" name="updateitem" value="Update Item" class="btn btn-secondary my-1">
    </form>
<div class='' id="deleteConfrm" title="confirm Delete"><p>Are you sure?</p></div>
_FORM2;

}else{
    header('Location: iindex.php');
}
?>


<script type="text/javascript">
    $('[name="deleteitem"]').on('click', function (e) {
        e.preventDefault();
        $('form[name="items"]').attr('action','iindex.php?content=removeitem');
        $('#deleteConfrm').dialog('open');
    })


    $('#deleteConfrm').dialog({
        modal: true,
        autoOpen: false,
        buttons: {
            "Confirm" :function () {
                $('form[name="items"]').submit();
            },
            "Cancel": function () {
                $(this).dialog('close');
            }
        }
    });
</script>
