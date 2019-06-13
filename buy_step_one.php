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
    if( isset( $_GET["msg"]) )
    {
        if($_GET["msg"]==1)
        {
            $errMsg = "<p class='hidden_err_txt'>ID、またはパスワードが不正です。または入力漏れがあります。</p>";
        }
        else if($_GET["msg"]==2) 
        {
            $errMsg = "<p class='hidden_err_txt'>ログインして下さい。</p>";
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>bloem | Buy_step_one</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/buy_top_step.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Raleway:400,700,800|Shadows+Into+Light|Ubuntu" rel="stylesheet">
        <link href="fonts/ipaexg.ttf">
        <link rel="stylesheet" href="//unpkg.com/flatpickr/dist/flatpickr.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>　<!-- calendar -->
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
                <form method="post" action="login_re.php">
                    <div class="login_wrap">
                        <h3>会員登録をされているお客様</h3>
                        <div class="err_msg"><?php echo $errMsg ?></div>
                        
                        <input type="text" placeholder="ID" class="id_text text" name="id"><input type="password" placeholder="Password" class="pass_text text" name="password">
                        
                        <input type="submit" value="ログインして購入手続きへ" class="login_btn">
                    </div>
                </form>
                <form method="post" action="check.php">
                    <div class="input_wrap">
                        <h3>会員登録をされていないお客様</h3>
                        <div class="err_msg"><?php echo $errMsg ?></div>
                        <h3>メッセージカード</h3>
                        <textarea class="gift_message" name="gift_msg" placeholder="メッセージカードをご利用の方はこちらにご記入ください"></textarea>
                        
                        <h3>お名前</h3>
                            <div class="name_input">
                                <input type="text" name="first_name" placeholder="姓"><input type="text" name="last_name" placeholder="名">
                            </div>
                        
                        <h3>住所</h3>                            
                            <div class="address_input">
                                <input type="text" name="zip01" class="form_text" onkeyup="AjaxZip3.zip2addr(this,'','pref01','addr01');" placeholder="郵便番号"><input type="text" name="pref01" class="form_text" placeholder="都道府県"><input type="text" name="addr01" class="form_text" placeholder="住所"><input type="text" name="addr02" class="form_text" placeholder="マンション名・アパート名">
                            </div>
                        
                        <h3>電話番号・メールアドレス</h3>
                            <div class="tel_mail_input">
                                <input type="text" name="tel" class="tel" placeholder="電話番号"><input type="text" name="mail" class="mail" placeholder="メールアドレス">
                            </div>
                        
                        <h3>お届け希望日</h3>
                            <div class="day_input">
                                <input class="flatpickr calender" name="calendar" id="calendar-tomorrow" type="text" placeholder="ご希望の日付を選択">
                            </div>
                        
                        <h3>クレジットカード決済</h3>
                            <div class="cash_input">
                                <p>クレジットカード番号</p>
                                <input type="text" name="cash_num" class="cash_num" placeholder="クレジットカード番号を入力">
                                <p>有効期限</p>
                                <input type="text" name="cash_month" class="cash_month" placeholder="月"><input type="text" name="cash_year" class="cash_year" placeholder="年">
                                <p>セキュリティコード</p>
                                <input type="text" name="cash_security" class="cash_security" placeholder="裏面にある3桁の数字を入力してください">
                            </div>
                        
                        <div class="btn_wrap">
                            <input type="submit" name="input_re" value="入力情報の確認" class="input_re check_btn">
                            <a href="main.php" class="back_btn">TOP</a>
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
        <script>
            flatpickr('.flatpickr');
            flatpickr('#calendar-tomorrow', {
                "minDate": new Date().fp_incr(1)
            });
        </script> 
    </body>
</html>