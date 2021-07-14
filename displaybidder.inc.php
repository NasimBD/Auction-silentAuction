<?php
if(isset($_SESSION['loginn'])){
    if(isset($_POST['displaybidder']) && isset($_POST['bidderid']) && strlen(trim($_POST['bidderid']))!=0){

        $bidderid = sanitizeString($_POST['bidderid']);
        $bidder = Bidder::findBidder($bidderid);
        if(isset($bidder)){
            print "<div>$bidder</div>";

            $items = Item::getItemsbyBidder($bidderid);

            $itemtotal = 0;
            if(isset($items)){

                echo <<<_TABLE1
<table class="table table-striped table-bordered table-hover table-responsive mt-4 border-0">
    <thead >
    <tr>
        <th>Item ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>
_TABLE1;
                foreach ($items as $item){

                    printf( "<tr><td>%s</td>", $item->itemid);
                    printf( "<td>%s</td>", $item->name);
                    printf( "<td>%s</td>", $item->description);
                    printf( "<td>&dollar; %s</td></tr>", $item->winprice);
                    $itemtotal += $item->winprice;
                }

                echo "<tr><td colspan='3'>Total</td>";
                printf( "<td>&dollar; %s</td></tr>", $itemtotal);
                echo "</tbody></table>";
                echo "<a href='iindex.php?content=listbidders' class='btn btn-warning my-2'>Back to bidders' list</a>";
        }else{
           echo "<div class='alert alert-warning text text-center mx-auto my-3'>There are no items for this bidder. </div><a href='iindex.php?content=listbidders' class='btn btn-warning'>Back to bidders' list</a>";
        }

}else{
    echo  "<div class='alert alert-warning text text-center mx-auto'>Not a valid bidder ID. </div><a href='iindex.php?content=listbidders' class='btn btn-warning'>Select a bidder</a>";
}

    }else{
        echo "<div class='alert alert-warning text text-center mx-auto'>You have not selected a valid bidder. Please select one. </div><a href='iindex.php?content=listbidders' class='btn btn-warning'>Select a bidder</a>";
    }


}else{
    header('Location: iindex.php');
}
?>
<!--ISSET checks the variable to see if it has been set. In other words, it checks to see if the variable is any value except NULL or not assigned a value. ISSET returns TRUE if the variable exists and has a value other than NULL. That means variables assigned a "", 0, "0", or FALSE are set, and therefore are TRUE for ISSET.

EMPTY checks to see if a variable is empty. Empty is interpreted as: "" (an empty string), 0 (integer), 0.0 (float)`, "0" (string), NULL, FALSE, array() (an empty array), and "$var;" (a variable declared, but without a value in a class. -->

