<?php

if(!isset($_POST["id"],$_POST["pass"]))
{
    //エラー処理
    header("Location: index.php?msg=2");
    exit;
}else if(trim($_POST["id"])=="" || trim($_POST["pass"])==""){
	   header("Location: index.php?msg=3");
    exit;
}

$dsn = "mysql:host=localhost;dbname=wp32;charset=utf8";
$db_user = "root";
$db_password = "";
$id = $_POST["id"];
$pass = $_POST["pass"];
$clear = false;

try{
	//DB接続
	$pdo  = new PDO($dsn,$db_user,$db_password);
	//エラーモードの変更
    //黙殺→例外へ
    //※既定の設定はERRMODE_SILENT
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
     );
	
	//SELECT
	$sql = "SELECT * FROM bloem_user WHERE(id = ? AND password = ?)";
    //SQL発行(実行)
    //戻り値として、ステートメント
    //が返却される。
    $stmt = $pdo->prepare( $sql );
    $stmt->bindValue(1,$id);
    $stmt->bindValue(2,$pass);
    $stmt->execute();
    if($stmt->fetch()) 
    {
		      $clear = true;
        echo "ok";
	   }else{
        $clear = false;
        echo "no";
	   }
    }catch( Exception $e){
        echo mb_convert_encoding(
        $e->getMessage(),
        "UTF-8","SJIS");
    }
    //DB切断
    $pdo = null;

    if($clear==true)
    {
        session_start();
	       $_SESSION["user"] = true;
	       header("Location: main.php");
        exit;
    }else{
        header("Location: index.php?msg=1");
        exit;
    }


?>