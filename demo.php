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
        <title>bloem | Result</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="css/swiper.min.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Raleway:400,700,800|Shadows+Into+Light|Ubuntu" rel="stylesheet">
        <link href="fonts/ipaexg.ttf">    
    </head>
    <body>
        <div class="wrapper">
            <!---------------------
                 header
            ---------------------->
            <header class="header">
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
                <?php
                    try {
                            $dbh = new PDO($dsn,$db_user,$db_password);
                            $sql = "SELECT * FROM bloem_product";
                            $stmt = $dbh->query($sql);
                            $stmt_array = $stmt->fetchAll();
                            define("1",1);
                            define("2",2);
                            define("4",4);
                            define("8",8);
                            define("16",16);
                            //var_dump($_POST);
                            //print_r($_POST);

                            if( !isset($_POST["flowers"]) ) {
                                echo "<div class='error_wrap'>".
                                     "<h2 class='text-center err_text'>選択された花がございませんでした。<br>お手数ですが１つ前に戻り、操作をし直してください。</h2>".
                                     "<a href='demo_select.php' class='err_back_btn'>戻る</a>".
                                     "</div>";
                            } else {
                                $flowers = $_POST["flowers"];
                                $k = 0;

                                foreach($flowers as $flower) {
                                    $k = $k | $flower;
                                    $flower = ["1079.png",
                                               "1223.png",
                                               "1238.png",
                                               "1236.png",
                                               "1077.png",
                                               "1086.png",
                                               "1087.png",
                                               "1093.png",
                                               "1094.png",
                                               "1222.png",
                                               "1234.png",
                                               "1225.png",
                                               "1226.png",
                                               "1228.png",
                                               "1229.png",
                                               "1231.png",
                                               "1232.png",
                                               "1233.png",
                                               "1234.png",
                                               "1235.png",
                                               "1236.png",
                                               "1237.png",
                                               "1238.png",
                                               "1239.png",
                                               "1240.png",
                                               "1241.png",
                                               "1242.png",
                                               "1243.png",
                                               "1244.png",
                                               "1245.png",
                                               "1246.png",
                                               "1247.png",
                                               "1248.png",
                                               "1249.png",
                                               "1250.png",
                                               "1251.png",
                                               "1252.png",
                                               "1253.png",
                                               "1254.png",
                                               "1255.png",
                                               "1256.png",
                                               "1257.png",
                                               "1258.png",
                                               "1259.png",
                                               "1224.png"
                                              ];
                                }
                                
                                echo "<div class='result_wrap'>";
                                echo "<h2>このような花はいかがでしょうか？</h2>";
                                echo "<div class='result_pac'>";
                                
                                $sql = "SELECT id FROM bloem_product where img='".$flower[$k]."'";
                                $stmt = $dbh->query($sql);
                                $stmt_array = $stmt->fetchAll();
                            
                                echo "<img src='images/$flower[$k]'>";
                                echo "</div>";
                                echo "<div class='btn_wrap'>";
                                echo "<a href='add_cart_demo.php?prod=".$stmt_array[0][0]."' class='cart_btn'>カートに入れる</a><a href='select_detail.php?prod=".$stmt_array[0][0]."' class='cart_btn'>詳細を見る</a><a href='demo_select.php' class='back_btn'>戻る</a>";
                                echo "</div>";
                                echo "</div>";
                                        
                            }
                    }catch(PDOException $e) {
                        echo $e->getMessage();
                        die();
                    }
                    $dbh = null;
                ?>
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
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
        <script></script>
    </body>
</html>