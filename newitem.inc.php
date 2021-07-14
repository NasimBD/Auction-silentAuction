<?php

if(isset($_SESSION['loginn'])){
   if(isset($_POST['add'])){
       $itemid = sanitizeString($_POST['itemid']);
       $name = sanitizeString($_POST['name']);
       $description = sanitizeString($_POST['description']);
       $resaleprice = sanitizeString($_POST['resaleprice']);
       $winbidder = sanitizeString($_POST['winbidder']);
       $winprice = sanitizeString($_POST['winprice']);
       $item = new Item($itemid, $name, $description, $resaleprice, $winbidder, $winprice);
       $result = $item->saveItem();
       if($result){
           echo "<div class='alert alert-success text text-center mx-auto'>Successfully added item with ID $itemid</div>";
           echo <<<_NEWINFO
<table class="table table-responsive table-borderless table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Resale Price</th>
        <th>Winbidder</th>
        <th>Winprice</th>
    </tr>
    </thead>
    <tr>
        <td>$itemid</td>
        <td>$name</td>
        <td>$description</td>
        <td>$resaleprice</td>
        <td>$winbidder</td>
        <td>$winprice</td>
    </tr>
</table>
<a class="btn btn-outline-success" href="iindex.php?content=updateitem&itemid=$itemid">Edit</a>
_NEWINFO;

       }else{
           echo "<div class='alert alert-danger text text-center mx-auto'>Sorry, problem adding item.</div>";
       }
   }else{
       ?>

       <div class="card m-2" id="formNewItm">
           <div class="card-body">
               <form action="" name="itemNew" method="post">
                   <div class="form-group row mx-0">
                       <label for="itemid" class="col-sm-4 col-form-label">Item ID</label>
                       <input type="text" name="itemid" id="itemid" class="form-control col-sm-8">
                   </div>


                   <div class="form-group row mx-0">
                       <label for="name" class="col-sm-4 col-form-label">Name</label>
                       <input type="text" name="name" id="name" class="form-control col-sm-8" >
                   </div>


                   <div class="form-group row mx-0">
                       <label for="description" class="col-sm-4 col-form-label">Description</label>
                       <input type="text" name="description" id="description" class="form-control col-sm-8" >
                   </div>

                   <div class="form-group row mx-0">
                       <label for="resaleprice" class="col-sm-4 col-form-label">Resale price</label>
                       <input type="text" name="resaleprice" id="resaleprice" class="form-control col-sm-8">
                   </div>

                   <div class="form-group row mx-0">
                       <label for="winbidder" class="col-sm-4 col-form-label">Winbidder</label>
                       <input type="tel" name="winbidder" id="winbidder" class="form-control col-sm-8">
                   </div>

                   <div class="form-group row mx-0">
                       <label for="winprice" class="col-sm-4 col-form-label">Winprice</label>
                       <input type="tel" name="winprice" id="winprice" class="form-control col-sm-8">
                   </div>

                   <input type="submit" name="add" value="Submit new item" class="btn btn-warning btn-block">
                   <a class='btn btn-outline-success mt-3' href='iindex.php'>Home</a>

               </form>
           </div>
       </div>

<?php
   }


}else{
    header('Location: iindex.php');
}
?>
