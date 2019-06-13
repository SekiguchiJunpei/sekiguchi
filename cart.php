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
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>bloem | Cart</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/cart.css">
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
                <div class="cart_wrap">
                    <?php		
                        if(!isset($_SESSION["cart"])){
                            echo "<p>カートに商品がありません。</p>";
                            echo "<p>合計個数：0個</p>";
                        }else{
                            $cart = $_SESSION["cart"];

                            try {
                                $dbh = new PDO($dsn,$db_user,$db_password);

                                if(count($cart) > 0){
                                    echo "<table>";
                                    echo "<tr>
                                    <th>イメージ</th>
                                    <th>商品名</th>
                                    <th>単価</th>
                                    <th>購入数量</th>
                                    <th>削除</th>
                                    </tr>";
                              }else{
                                    echo "<p class='text-center'>カートに商品はありません</p>";
                              }

                              foreach ($cart as $prod=>$val){
                                  $sql = "SELECT * FROM bloem_product WHERE(id = '".$prod."')";
                                  $stmt = $dbh->query($sql);

                                  foreach ($stmt as $pd){
                                        echo '<tr>';
                                        echo '<td><img src="images/'.$pd['img'].'"></td>'.
                                             '<td><a href="products_detail.php?prod='.$pd['id'].'">'.$pd['name'].'</a></td>'.
                                             '<td>'.$pd['price'].'</td>'.
                                             '<td>'.$val.'</td>'.
                                             '<td><a href="remove_cart.php?prod='.$pd['id'].'" class="delete_btn">削除</a></td>';
                                        echo '</tr>';
                                        echo '<div>';
                                        $sum = $val * $pd['price'];
                                        $sum_all += $sum;
                                  }
                              }
                                echo '</table>'; 
                                echo '<div class="sum">';
                                echo '<p>合計金額：'.$sum_all.'円</p>';
                                echo '</div>';
                            }catch(PDOException $e) {
                                echo $e->getMessage();
                                die();
                            }
                        }
                    ?>
                    <div class="btn_wrap">
                        <a href="buy_step_one.php" class="credit_btn">決済</a><a href="products.php" class="back_btn">戻る</a>
                    </div>
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