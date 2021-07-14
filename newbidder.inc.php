<h2 class="h4 text-center">Enter new bidder information</h2>

<div class="card border-0">
    <div class="card-body">
        <form name="newbidder" action="iindex.php" method="post">
            <div class="form-group row mx-0">
                <label for="bidderid" class="col-sm-4 col-form-label">Bidder ID</label>
                <input type="text" name="bidderid" id="bidderid" class="form-control col-sm-8">
            </div>


            <div class="form-group row mx-0">
                <label for="lastname" class="col-sm-4 col-form-label">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control col-sm-8">
            </div>


            <div class="form-group row mx-0">
                <label for="firstname" class="col-sm-4 col-form-label">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control col-sm-8">
            </div>


            <div class="form-group row mx-0">
                <label for="address" class="col-sm-4 col-form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control col-sm-8">
            </div>

            <div class="form-group row mx-0">
                <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                <input type="tel" name="phone" id="phone" class="form-control col-sm-8">
            </div>

            <input type="submit" value="Submit new bidder" class="btn btn-secondary btn-block">
            <input type="hidden" name="content" value="addbidder">
            <a class='btn btn-outline-success mt-3' href='iindex.php'>Home</a>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('form[name="newbidder"]').find('#bidderid').focus().select();
    })
</script>