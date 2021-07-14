<?php
if(isset($_SESSION['loginn'])){

$bidders = Bidder::getBidders();
if(count($bidders)){
    echo "    <form name='bidders' method='post'>";
    echo "<select name='bidderid' class='custom-select mb-3' size='7'>";
foreach ($bidders as $bidder){
    $bidderid = $bidder->bidderid;
    $name = "$bidder->bidderid - $bidder->firstname - $bidder->lastname";
    echo "<option value='$bidderid'>$name</option>";
}
    echo "</select>";

    echo <<<_END
        <input type="submit" class="btn btn-success my-1" name="displaybidder" value="View Bidder" >
        <input type="submit" class="btn btn-warning my-1" name="deletebidder" value="Delete Bidder" >
        <input type="submit" class="btn btn-info my-1" name="updatebidder" value="Update Bidder" >
    </form>
    <div class='' id="deleteConfrm" title="confirm Delete"><p>Are you sure?</p></div>
_END;

    }
    else{
        echo "<div class=\"alert alert-light text-center mx-auto\">There is no bidder.</div>";
    }

}else{
    header('Location: iindex.php');
}
?>

<script type="text/javascript">
    $('option').on('dblclick', function () {
        $('input[name="displaybidder"]').click();
    })

    $('input[type="submit"]').on('click',function (evnt) {
        let target = $(this).attr('name');
        switch (target) {
            case 'displaybidder':
                $('form[name="bidders"]').attr('action','iindex.php?content=displaybidder');
                break;

            case 'deletebidder':
                evnt.preventDefault();
                $('form[name="bidders"]').attr('action','iindex.php?content=removebidder');
                $('input[name="displaybidder"] , input[name="updatebidder"]').prop('disabled',true);
                $('#deleteConfrm').dialog('open');
                break;

            case 'updatebidder':
                $('form[name="bidders"]').attr('action','iindex.php?content=updatebidder');
                break;
        }
    })


$('#deleteConfrm').dialog({
    modal: true,
    autoOpen: false,
    buttons: {
        "Confirm" :function () {
            $('form[name="bidders"]').submit();
        },
        "Cancel": function () {
            $(this).dialog('close');
        }
    }
});

</script>