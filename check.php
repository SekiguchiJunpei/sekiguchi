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

    
    if(!isset($_POST["first_name"],$_POST["last_name"])) {
        header("Location: buy_step_one.php?err=2");
        exit;
    }
    //POSTで渡されたと仮定
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $zip01=$_POST['zip01'];
    $pref01=$_POST['pref01'];
    $addr01=$_POST['addr01'];
    $addr02=$_POST['addr02'];
    $tel=$_POST['tel'];
    $mail=$_POST['mail'];
    $cash_num=$_POST['cash_num'];
    $cash_month=$_POST['cash_month'];
    $cash_year=$_POST['cash_year'];
    $cash_security=$_POST['cash_security'];

    if($_POST["first_name"]=="" || $_POST["first_name"]==null || 
       $_POST["last_name"]=="" || $_POST["last_name"]==null || 
       $_POST["zip01"]=="" || $_POST["zip01"]==null ||
       $_POST["pref01"]=="" || $_POST["pref01"]==null || 
       $_POST["addr01"]=="" || $_POST["addr01"]==null || 
       $_POST["addr02"]=="" || $_POST["addr02"]==null || 
       $_POST["tel"]=="" || $_POST["tel"]==null ||
       $_POST["mail"]=="" || $_POST["mail"]==null || 
       $_POST["cash_num"]=="" || $_POST["cash_num"]==null ||
       $_POST["cash_month"]=="" || $_POST["cash_month"]==null || 
       $_POST["cash_year"]=="" || $_POST["cash_year"]==null ||
       $_POST["cash_security"]=="" || $_POST["cash_security"]==null){
            header("Location: buy_step_one.php?err=2");
            exit;
        }

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>bloem | Check</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/check.css">
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
                            <li><a href="select.php">Select</a></li>
                            <li><a href="products.php">Product</a></li>
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="add_member.php">Sign in</a></li>
                        </ul>
                    </nav>

                </div>
                </div>
            </header>
            
            <main class="main">
                <div class="check_wrap">
                    <?php
                            //メッセージカード
                            echo "<h3>メッセージカード</h3>";
                            if ( isset($_POST["gift_msg"]) ) {
                                $gift_msg = htmlspecialchars($_POST["gift_msg"]);
                                echo "<p>メッセージカード：$gift_msg</p>";
                            }

                            //名前
                            echo "<h3>お名前</h3>";
                            if ( isset($_POST["first_name"]) || isset($_POST["last_name"]) ) {
                                $name = htmlspecialchars($_POST["first_name"]);
                                $name2 = htmlspecialchars($_POST["last_name"]);
                                echo "<p>姓：$name</p>";
                                echo "<p>名：$name2</p>";
                            }

                            //住所
                            echo "<h3>住所</h3>";
                            if ( isset($_POST["zip01"]) || isset($_POST["pref01"]) || isset($_POST["addr01"]) || isset($_POST["addr01"]) ) {
                                $adr01 = htmlspecialchars($_POST["zip01"]);
                                $adr02 = htmlspecialchars($_POST["pref01"]);
                                $adr03 = htmlspecialchars($_POST["addr01"]);
                                $adr04 = htmlspecialchars($_POST["addr02"]);
                                echo "<p>郵便番号：$adr01</p>";
                                echo "<p>都道府県：$adr02</p>";
                                echo "<p>住所：$adr03$</p>";
                                echo "<p>マンション名・アパート名：$adr04</p>";
                            }

                            //電話・メアド
                            echo "<h3>電話番号・メールアドレス</h3>";
                            if ( isset($_POST["tel"]) || isset($_POST["mail"]) ) {
                                $tel = htmlspecialchars($_POST["tel"]);
                                $mail = htmlspecialchars($_POST["mail"]);
                                echo "<p>電話番号：$tel</p><p>メールアドレス：$mail</p>";
                            }

                            //お届け希望日
                            echo "<h3>お届け希望日</h3>";
                            if ( isset($_POST["calendar"]) ) {
                                $calendar = htmlspecialchars($_POST["calendar"]);
                                echo "<p>お届け希望日：$calendar</p>";
                            }

                            //クレカ
                            echo "<h3>クレジットカード決済</h3>";
                            if ( isset($_POST["cash_num"]) || isset($_POST["cash_month"]) || isset($_POST["cash_year"]) || isset($_POST["cash_security"]) ) {
                                $cash_num = htmlspecialchars($_POST["cash_num"]);
                                $cash_month = htmlspecialchars($_POST["cash_month"]);
                                $cash_year = htmlspecialchars($_POST["cash_year"]);
                                $cash_security = htmlspecialchars($_POST["cash_security"]);
                                echo "<p>クレジットカード番号：$cash_num</p><p>月：$cash_month</p><p>年：$cash_year</p><p>セキュリティコード：$cash_security</p>";
                            }
                        
                    ?>
                    
                </div>
                <div class="btn_wrap">
                    <a href="buy_finish.php" class="finish_btn">購入</a>
                    <a href="buy_step_one.php" class="back_btn">戻る</a>
                </div>
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
    </body>
    </html>