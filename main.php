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
        <title>bloem | Top</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/swiper.min.css">
        <link rel="stylesheet" href="css/aos.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Raleway:400,700,800|Shadows+Into+Light|Ubuntu" rel="stylesheet">
        <link href="fonts/ipaexg.ttf">
    </head>
    <body>
        <div class="wrapper">
            <!---------------------
                 header
            ---------------------->
            <header class="header">
                <!---------------------
                 main_visual
                ---------------------->
                <div class="main_visual">
                    <div class="loop"></div>
                    <!--<p>bloem</p>-->
                    <img src="images/IW31-logo-sample.png" alt="logo" class="logo">
                    <img src="images/allow.png" alt="allow" class="allow">
                </div>
                
                <div class="navbar navbar-default navbar-static-top header">
                <div class="clearfix header-container">

                    <!---------------------
                         header-contents
                    ---------------------->
                    <div class="navbar-header">

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

            <!---------------------
                メイン 
            ---------------------->
            <main class="main">
                <section class="about_wrap">
                    <h2>Concept</h2>
                    <p>あなたに喜ばれる花を選びたい。選ばせたい。</p>
                    <a href="about.php" class="next_btn">bloemについて</a>
                    <img src="images/1216.png" alt="flower" class="about_flower">
                    <img src="images/1110.png" alt="flower" class="about_flower_sec">
                </section>
                
                <div class="use_before"></div>
                
                <section class="use_wrap">
                    <h2>How to Use</h2>
                    <div class="use_step_text">
                        <ul>
                            <li data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="400">
                                <img src="images/select.png" alt="select">
                                <h3>Step1</h3>
                                <p>どんな想いで花を贈りたいのかを<br>選択して頂けます。</p>
                            </li>
                            <li data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="400">
                                <img src="images/present.png" alt="present">
                                <h3>Step2</h3>
                                <p>チェックした花からあなたにオススメの商品を<br>ご提示致します。</p>
                            </li>
                            <li data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="400">
                                <img src="images/click.png" alt="click">
                                <h3>Step3</h3>
                                <p>最後は『カートに入れる』のボタンを<br>クリックするだけです。</p>
                            </li>
                        </ul>
                    </div>
                    <a href="demo_select.php" class="demo_btn">使ってみる</a>
                </section>
                
                <div class="products_before"></div>
                
                <section class="product_wrap">
                    <h2>Product</h2>
                    <div class="swiper-container">
                        <?php		
                            try {
                                    $dbh = new PDO($dsn,$db_user,$db_password);
                                    $sql = "SELECT * FROM bloem_product";
                                    $stmt = $dbh->query($sql);
                                    echo "<div class='swiper-wrapper'>";
                                    foreach ($stmt as $row) {
                                        echo '<a href="products_detail.php?prod='.$row['id'].'" class="swiper-slide">'.
                                             '<img src="images/'.$row['img'].'" class="product_img">'.
                                             '<div class="main_product_name">'.$row["name"].'</div>'.
                                             '<div class="main_product_price">'.$row["price"].'</div>'.
                                             '</a>';
                                    }
                                    echo "</div>";
                                } catch(PDOException $e) {
                                    echo $e->getMessage();
                                    die();
                                }
                            $dbh = null;
                        ?>
                    </div>
                    <a href="products.php" class="products_btn">商品一覧</a>
                </section>
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
        <script src="js/aos.js"></script>
        <script src="js/swiper.js"></script>
        <script>
            /* scroll */
            AOS.init();
            
            var swiper = new Swiper('.swiper-container', {
	               slidesPerView: 3,
                centeredSlides: true,
                loop: true,
                autoplay: {
                    delay: 5000
                },
                breakpoints: {
                    768: {
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        spaceBetween: 0
                    }
                }
            });
        </script>
    </body>
</html>