<?php
if(!isset($_SESSION['loginn'])){
    ?>
    <p class="alert alert-danger mx-2 mb-4 text-center font-weight-bold">
        ID: 2 <br>
        Password: ross
    </p>

    <div class="card mx-2">
        <div class="card-header bg-primary text-light">
            <h4 class="h4">Please log in</h4>
        </div>

        <div class="card-body">
            <form action="iindex.php" method="post">
                <div class="form-group row mx-0">
                    <label for="userid" class="col-sm-4 col-form-label">ID</label>
                    <input type="text" name="userid" id="userid" class="form-control col-sm-8">
                </div>

                <div class="form-group row mx-0">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control col-sm-8">
                </div>

                <input type="submit" name="submit" value="Login" class="btn btn-outline-primary btn-block">
                <input type="hidden" name="content" value="validate">
            </form>

        </div>
    </div>
    <?php
}else{
    echo "<div class='alert alert-light'> <h2 class='h4'>Welcome to AuctionHelper</h2>\n";
    echo "<br><br>\n";
    echo "<p>This program tracks bidder and auction item information</p>\n";
    echo "<p>Please use the links in the navigation window</p>\n";
    echo "<p>Please DO NOT use the browser navigation buttons!</p></div>\n";
}
?>