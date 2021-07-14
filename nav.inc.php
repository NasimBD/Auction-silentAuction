
<?php
if(!isset($_SESSION['loginn'])){
    
}else{
    echo "    <h6 class='h6 small font-weight-bold py-2 border-bottom border-light'>Welcome, {$_SESSION['loginn']}</h6>"
   ?>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="iindex.php">Home</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">Bidders</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="iindex.php?content=listbidders">List Bidders</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="iindex.php?content=newbidder">Add New Bidder</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">Items</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="iindex.php?content=listitems">List Items</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="iindex.php?content=newitem">Add New Item</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="iindex.php?content=logout">Logout</a>
        </li>
    </ul>


    <form action="iindex.php" method="post" class="mt-3">
        <div class="form-group">
            <label for="itemid" >Search for item</label>
            <input type="text" name="itemid" id="itemid" class="form-control form-control-sm">
        </div>
        <input type="submit" name="submit" value="Find" class="btn btn-sm btn-outline-light">
        <input type="hidden" name="content" value="updateitem">
    </form>


    <form action="iindex.php" method="post" class="mt-5">
        <div class="form-group">
            <label for="bidderid" >Search for bidder</label>
            <input type="text" name="bidderid" id="bidderid" class="form-control form-control-sm">
        </div>
        <input type="submit" name="displaybidder" value="Find" class="btn  btn-sm btn-outline-light">
        <input type="hidden" name="content" value="displaybidder">
    </form>
<?php
}?>
