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
        <title>bloem | Products_detail</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/products_detail.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Raleway:400,700,800|Shadows+Into+Light|Ubuntu" rel="stylesheet">
        <link href="fonts/ipaexg.ttf">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.min.js"></script>
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
                <div class="detail_wrap">
                    <?php
                        try {
                                $dbh = new PDO($dsn,$db_user,$db_password);
                                $sql = "SELECT * FROM bloem_product WHERE(id = '".$_GET['prod']."')";
                                $stmt = $dbh->query($sql);
                            
                                foreach ($stmt as $row) {
                                    echo '<div class="detail_room">'.
                                         '<div class="detail_contents">'.
                                         '<figure><img src="images/'.$row['img'].'" class="detail_img"></figure>'.
                                         '</div>'.
                                         '<div class="detail_text">'.
                                         '<h2 class="detail_name">'.$row['name'].'</h2>'.
                                         '<p class="detail_description">商品概要：<br>'.$row['description'].'</p>'.
                                         '<p class="detail_price">金額：'.$row['price'].'円</p>'.
                                         '<div class="btn_wrap">'.
                                         '<a href="add_cart_detail.php?prod='.$row['id'].'" class="cart_btn">カートに入れる</a>'.
                                         '<a href="products.php" class="cart_btn">戻る</a>'.
                                         '</div>'.
                                         '</div>'.
                                         '</div>';
                                }
                                    
                            }catch(PDOException $e) {
                                echo $e->getMessage();
                                die();
                            }
                            $dbh = null;
                    ?>
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
        <script></script>
    </body>
</html>