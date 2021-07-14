<?php
session_start();
require_once 'functions.inc.php';
require_once 'classes/bidder.php';
require_once 'classes/items.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Bootstrap and jQuery CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- jQuery-UI CDN-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

    <!--  css-->
    <link rel="stylesheet" href="css/ah_styles.css">

    <title>N_auction</title>
</head>
<body>

<div class="container-fluid p-0 container-xl">
    <header>
        <?php include_once 'header.inc.php'; ?>
    </header>

    <section>
        <nav>
            <?php include_once 'nav.inc.php';?>
        </nav>

        <main>
            <?php
            if(isset($_REQUEST['content'])){
                include_once $_REQUEST['content'].'.inc.php';
            }else{
                include_once 'main.inc.php';
            }
            ?>
        </main>

        <aside>
            <?php include_once 'aside.inc.php';?>
            <script type="text/javascript">
                $(function () {
                    getRealTime();
                    setInterval(getRealTime, 30000);
                })
            </script>

        </aside>

    </section>
    <footer>
        <?php include_once 'footer.inc.php';?>
    </footer>
</div>


<script type="text/javascript">
    function getRealTime() {
        $.ajax({
            url: "realtime.php",
            type: 'GET',
            beforeSend: function () {
                console.log(Date.now());
            },
            error: function () {
                console.log('error');
            }
            ,

            success: function (data) {
                let bidderCount = $(data).find('bidders').text();
                $('#biddercount').text(bidderCount);

                let itemCount = $(data).find('items').text();
                $('#itemcount').text(itemCount);

                let itemTotal = $(data).find('itemTotal').text();
                $('#itemtotal').text(itemTotal);

                let bidTotal = $(data).find('bidTotal').text();
                $('#bidtotal').text(bidTotal);
            }

        })
    }
</script>
</body>
</html>
