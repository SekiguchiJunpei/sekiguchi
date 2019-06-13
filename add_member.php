<?php 
    $dsn = "mysql:host=localhost;dbname=wp32;charset=utf8";
    $db_user = "root";
    $db_password = "";
    $sql = null;
    $res = null;
    $dbh = null;
    $sum_all = 0;

    session_start();
    if(!isset($_SESSION["user"])){
        //エラー処理
        header("Location: index.php?msg=2");
        exit;
    }   

    $errMsg = "";
    if( isset($_GET["err"]) ) {
        if($_GET["err"]==1) {
            $errMsg = "正常に登録されました";
        }
        if($_GET["err"]==2) {
            $errMsg = "DB登録でエラーが発生しました";
        }
        if($_GET["err"]==3) {
            $errMsg = "不正なリクエストです";
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>bloem | Add_member</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/add_member.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Raleway:400,700,800|Shadows+Into+Light|Ubuntu" rel="stylesheet">
        <link href="fonts/ipaexg.ttf">
        <link rel="stylesheet" href="//unpkg.com/flatpickr/dist/flatpickr.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/ajaxzip3.js" charset="UTF-8"></script> <!-- 住所自動入力 -->
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
                <form method="post" action="add_user.php">
                    <div class="add_wrap">
                    <h1 class="text-center">会員登録</h1>
                        <!-- エラーメッセージの表示領域 -->
                        <?php echo $errMsg ?><br>
                        
                        <input type="text" placeholder="id" class="pass_text text" name="id"><br>
                        <input type="password" placeholder="Password" class="pass_text text" name="password">
                        
                        <h3>お名前</h3>
                            <div class="name_input">
                                <input type="text" name="first_name" placeholder="姓"><br>
                                <input type="text" name="last_name" placeholder="名">
                            </div>
                        
                        <h3>住所</h3>                            
                            <div class="address_input">
                                <input type="text" name="zip01" class="form_text" onkeyup="AjaxZip3.zip2addr(this,'','pref01','addr01');" placeholder="郵便番号"><br>
                                <input type="text" name="pref01" class="form_text" placeholder="都道府県"><br>
                                <input type="text" name="addr01" class="form_text" placeholder="住所"><br>
                                <input type="text" name="addr02" class="form_text" placeholder="マンション名・アパート名">
                            </div>
                        
                        <h3>電話番号・メールアドレス</h3>
                            <div class="tel_mail_input">
                                <input type="text" name="tel" class="tel" placeholder="電話番号"><br>
                                <input type="text" name="mail" class="mail" placeholder="メールアドレス">
                            </div>
                        
                        <h3>クレジットカード決済</h3>
                            <div class="cash_input">
                                <p>クレジットカード番号</p>
                                <input type="text" name="cash_num" class="cash_num" placeholder="クレジットカード番号を入力">
                                <p>有効期限</p>
                                <input type="text" name="cash_month" class="cash_month" placeholder="月"><br>
                                <input type="text" name="cash_year" class="cash_year" placeholder="年">
                                <p>セキュリティコード</p>
                                <input type="text" name="cash_security" class="cash_security" placeholder="セキュリティコード">
                            </div>
                        
                        <div class="btn_wrap">
                            <input type="submit" value="入力情報の確認" class="input_re check_btn">
                            <a href="main.php" class="back_btn">戻る</a>
                        </div>
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
    </body>
</html>