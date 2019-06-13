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
        <title>bloem | About</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/about.css">
        <link rel="stylesheet" href="css/aos.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Raleway:400,700,800|Shadows+Into+Light|Ubuntu" rel="stylesheet">
        <link href="fonts/ipaexg.ttf">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
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
                <div class="concept_wrap">
                    <section class="concept_section" data-aos="fade-up" data-aos-duration="900" data-aos-offset="300" data-aos-easing="ease-in-sine">
                        <h2>About</h2>
                        <p>『あなたに喜ばれる花を選びたい。選ばせたい。』<br>
                           この言葉をコンセプトに考え出されたのが、本サイトの「bloem」です。この言葉はオランダの言葉で「花」を意味しています。<br>
                           世界中の花の約6割が集まるとされているオランダの言葉を使った理由は、このサイトがお客様にとっての花の都のような存在であればと思い名付けられました。手軽に、また迷いなく花を贈ることのできる環境を創ることで、お客様の笑顔を咲かせられることを目指しております。
                           </p>
                    </section>
                </div>
                
                <div class="service_wrap">
                    <section>
                        <div class="select" data-aos="fade-right" data-aos-duration="900" data-aos-offset="300" data-aos-easing="ease-in-sine">
                            <div class="select_text">
                                <div class="select_pac">
                                    <div class="select_title">
                                        <h2>Root</h2>
                                    </div>
                                    <div class="select_author">
                                        <p>このサービスを考えた時、思い浮かんだのは祖父母の姿でした。私は祖父母の誕生日に花を贈ったことを思い出し、嬉しそうに笑う顔をまた見たいと思いました。ですが実家のある北海道では花屋は遠く、子供の足では大変な道のりでした。もしあの頃に、このようなサービスがあればと思い『bloem』を創りました。</p>
                                    </div>
                                </div>
                            </div>
                            <div class="select_pic"></div>
                        </div>
                        
                        <div class="buy" data-aos="fade-left" data-aos-duration="900" data-aos-offset="300" data-aos-easing="ease-in-sine">
                            <div class="buy_pic"></div>
                            <div class="buy_text">
                                <div class="buy_pac">
                                    <div class="buy_title">
                                        <h2>Wish</h2>
                                    </div>
                                    <div class="buy_author">
                                        <p>このサービスを使って笑顔を増やす、それがこの『bloem』の願いです。それ以上の言葉はなく、利用者の方にも、贈られる方にも笑顔になってほしいそれが、私の願いです。</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="select_sec" data-aos="fade-right" data-aos-duration="900" data-aos-offset="300" data-aos-easing="ease-in-sine">
                            <div class="select_text">
                                <div class="select_pac">
                                    <div class="select_title">
                                        <h2>Color</h2>
                                    </div>
                                    <div class="select_author">
                                        <p>この背景の黄色は、花を贈られた方の明るい笑顔を表しており、笑顔を咲かすことを目指しているこのサイトに適した色だと思い、この黄色を背景にしました。</p>
                                    </div>
                                </div>
                            </div>
                            <div class="select_sec_pic"></div>
                        </div>
                    </section>
                </div>
                
                <div class="access_wrap">
                    <section>
                        <h2>Access</h2>
                        <ul class="access_list">
                            <li>東京<br>160-0023<br>東京都新宿区西新宿1-7-3</li>
                            <li>北海道<br>160-0023<br>北海道帯広市東2-39-4</li>
                            <li>オランダ<br>Huis Ten Bosch 123  1234 AB Amsterdam  Netherlands </li>
                        </ul>
                    </section>
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
        </script>
    </body>
</html>