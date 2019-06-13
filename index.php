<?php
    $errMessage = "";
    if( isset( $_GET["msg"]) )
    {
        if($_GET["msg"]==1)
        {
            $errMessage = "<p class='hidden_err_txt'>ID、またはパスワードが不正です。</p>";
        }
        else if($_GET["msg"]==2) 
        {
            $errMessage = "<p class='hidden_err_txt'>ログインして下さい。</p>";
        }
        else if($_GET["msg"]==3)
        {
            $errMessage = "<p class='hidden_err_txt'>入力して下さい。</p>";
        }
    }
?>
<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>FLOWER SHOP | bloom | login</title>
        <link rel="stylesheet" href="css/sanitize.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
	   <body>
		      <div class="wrapper">
            <div class="login_zone">
            <img src="images/IW31-logo-sample.png" class="logo_img">
			         <h1>Login</h1>
            <form method="post" action="login.php">
			             <div class="err_msg"><?php echo $errMessage ?></div>
				            <table>
                    <tr>
                        <th><label>ID</label><input type="text" placeholder="IDを入力して下さい" class="id_text text" name="id"></th>
                    </tr>
                    <tr>
                        <th><label>Password</label><input type="password" placeholder="Passwordを入力して下さい" class="pass_text text" name="pass"></th>
                    </tr>
                </table>
                <input type="submit" value="Login" class="login_btn">
            </form>
            </div>
        </div>
    </body>
</html>