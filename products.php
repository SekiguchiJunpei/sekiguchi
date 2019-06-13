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
        <title>bloem | Products</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/products.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Raleway:400,700,800|Shadows+Into+Light|Ubuntu" rel="stylesheet">
        <link href="fonts/ipaexg.ttf">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/masonry.pkgd.min.js"></script>
        <script src="js/aos.js"></script>
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
            
            <!-- products -->
            <main class="main">
                <div class="products_wrap">
                    <?php		
                        try {
                                $dbh = new PDO($dsn,$db_user,$db_password);
                                $sql = "SELECT * FROM bloem_product";
                                $stmt = $dbh->query($sql);

                                echo "<div class='grid'>";
                                foreach ($stmt as $row) {
                                    echo '<figure class="grid-item">'.
                                         '<img src="images/'.$row['img'].'" class="product_img">'.
                                         '<figcaption>'.
                                         '<a href="products_detail.php?prod='.$row['id'].'">'.
                                         '<p class="product_name">'.$row['name'].'</p>'.
                                         '<p class="product_price">'.$row['price'].'</p>'.
                                         '<a href="add_cart.php?prod='.$row['id'].'" class="cart_btn">カートに入れる</a>'.
                                         '</a>'.
                                         '</figcaption>'.
                                         '</figure>';
                                }
                                echo "</div>";
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
    
        <script>    
            /* scroll */
            AOS.init();
            
            $('.grid').masonry({
              itemSelector: '.grid-item',
              columnWidth: 300,
              isFitWidth: true
            });
        </script>
    </body>
</html>