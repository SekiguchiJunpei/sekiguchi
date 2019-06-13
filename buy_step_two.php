<?php
    $dsn = "mysql:host=localhost;dbname=wp32;charset=utf8";
    $db_user = "root";
    $db_password = "";
    $sql = null;
    $res = null;
    $dbh = null;

    session_start();
    if(!isset($_SESSION["user"])){
        //エラー処理
        header("Location: index.php?msg=2");
        exit;
    }  

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>bloem | Buy_step_two</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/check.css">
        <link rel="stylesheet" href="//unpkg.com/flatpickr/dist/flatpickr.min.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Raleway:400,700,800|Shadows+Into+Light|Ubuntu" rel="stylesheet">
        <link href="fonts/ipaexg.ttf">
    </head>
    <body>
        <div class="wrapper">
            <header>
                <div class="navbar navbar-default navbar-static-top header">
                <div class="clearfix header-container">

                    <!---------------------
                         header-contents
                    ---------------------->
                    <div class="navbar-header">
                        <!--<img src="images/IW31-logo-sample.png" alt="logo-image" class="logo_image" width="70%" height="auto">-->

                        <!---------------------
                            ハンバーガー 
                        ---------------------->
                        <button type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" class="navbar-toggle collapsed navbar-left">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <nav id="navbar" class="navbar-collapse collapse menu-global">
                        <ul class="nav navbar-nav menu-global-main">
                            <li><a href="main.php">Top</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="demo_select.php">Select</a></li>
                            <li><a href="products.php">Product</a></li>
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="add_member.php">Sign in</a></li>
                        </ul>
                    </nav>

                </div>
                </div>
            </header>
            
            <main class="main">
                <form method="post" action="check_two.php">
                    <div class="check_wrap">
                        <h3>メッセージカード</h3>
                        <textarea class="gift_message" name="gift_msg" placeholder="メッセージカードをご利用の方はこちらにご記入ください"></textarea>
                        <h3>お届け希望日</h3>
                        <div class="day_input">
                            <input class="flatpickr calender" name="calendar" id="calendar-tomorrow" type="text" placeholder="ご希望の日付を選択">
                        </div>
                    </div>
                    <div class="btn_wrap">
                        <input type="submit" name="input_re" value="入力情報の確認" class="input_re check_btn">
                        <a href="main.php" class="back_btn">TOP</a>
                    </div>
                </form>
            </main>
            
            <footer>
                <div class="footer_wrap">
                    <img src="images/IW31-logo-sample-white.png" alt="Flower Shop bloem" width="140px" height="auto">
                    <nav class="footer_nav">
                        <ul class="footer_nav_wrap">
                            <li><a href="main.php">Top</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="demo_select.php">Select</a></li>
                            <li><a href="products.php">Product</a></li>
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="add_member.php">Sign in</a></li>
                        </ul>
                    </nav>
                    <small>&copy;Flower Shop bloem</small>
                </div>
            </footer>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>　<!-- calendar -->
        <script>
            flatpickr('.flatpickr');
            flatpickr('#calendar-tomorrow', {
                "minDate": new Date().fp_incr(1)
            });
        </script> 
    </body>
    </html>