<?php
    if(!isset($_POST["id"],$_POST["password"],$_POST["first_name"],$_POST["last_name"],$_POST["zip01"],$_POST["pref01"],$_POST["addr01"],$_POST["addr02"],$_POST["tel"],$_POST["mail"],$_POST["cash_num"],$_POST["cash_month"],$_POST["cash_year"],$_POST["cash_security"])) {
        header("Location: add_member.php?err=2");
        exit;
    }

    //POSTで渡されたと仮定
    $id=$_POST['id'];
    $password=$_POST['password'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $zip01=$_POST['zip01'];
    $pref01=$_POST['pref01'];
    $addr01=$_POST['addr01'];
    $addr02=$_POST['addr02'];
    $tel=$_POST['tel'];
    $mail=$_POST['mail'];
    $cash_num=$_POST['cash_num'];
    $cash_month=$_POST['cash_month'];
    $cash_year=$_POST['cash_year'];
    $cash_security=$_POST['cash_security'];

    if($_POST["id"]=="" || $_POST["id"]==null || 
       $_POST["password"]=="" || $_POST["password"]==null ||
       $_POST["first_name"]=="" || $_POST["first_name"]==null || 
       $_POST["last_name"]=="" || $_POST["last_name"]==null || 
       $_POST["zip01"]=="" || $_POST["zip01"]==null ||
       $_POST["pref01"]=="" || $_POST["pref01"]==null || 
       $_POST["addr01"]=="" || $_POST["addr01"]==null || 
       $_POST["addr02"]=="" || $_POST["addr02"]==null || 
       $_POST["tel"]=="" || $_POST["tel"]==null ||
       $_POST["mail"]=="" || $_POST["mail"]==null || 
       $_POST["cash_num"]=="" || $_POST["cash_num"]==null ||
       $_POST["cash_month"]=="" || $_POST["cash_month"]==null || 
       $_POST["cash_year"]=="" || $_POST["cash_year"]==null ||
       $_POST["cash_security"]=="" || $_POST["cash_security"]==null){
            header("Location: add_member.php?err=2");
            exit;
        }

        //DSN(DataSourceName)
        //ざくっと接続先情報
        $dsn = "mysql:host=localhost;dbname=wp32;charset=utf8";
        $db_user = "root";
        $db_password = "";

        try{
                //DB接続
                $pdo = new PDO($dsn,$db_user,$db_password);
    
                //エラーモードの変更
                //黙殺→例外へ
                //※既定の設定はERRMODE_SILENT
                $pdo->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
     
                //エミュレートモードの変更
                $pdo->setAttribute(
                    PDO::ATTR_EMULATE_PREPARES,
                    false
                );
    
                //SQL文作成(プレースホルダVer)
                $sql = "INSERT INTO bloem_user(id,password,first_name,last_name,zip01,pref01,addr01,addr02,tel,mail,cash_num,cash_month,cash_year,cash_security) VALUES(:id,:password,:first_name,:last_name,:zip01,:pref01,:addr01,:addr02,:tel,:mail,:cash_num,:cash_month,:cash_year,:cash_security)";
    
                //プリペアードステートメントの取得
                $ps = $pdo->prepare($sql);
    
                //プレースホルダ(仮置き場)の設定
                $ps->bindValue(":id",$id);
                $ps->bindValue(":password",$password);
                $ps->bindValue(":first_name",$first_name);
                $ps->bindValue(":last_name",$last_name);
                $ps->bindValue(":zip01",$zip01);
                $ps->bindValue(":pref01",$pref01);
                $ps->bindValue(":addr01",$addr01);
                $ps->bindValue(":addr02",$addr02);
                $ps->bindValue(":tel",$tel);
                $ps->bindValue(":mail",$mail);
                $ps->bindValue(":cash_num",$cash_num);
                $ps->bindValue(":cash_month",$cash_month);
                $ps->bindValue(":cash_year",$cash_year);
                $ps->bindValue(":cash_security",$cash_security);
    
                //SQL発行(実行)
                $ps->execute();

                header("Location: add_member.php?err=1");
                exit;

            }catch( Exception $e ){
                echo $e->getMessage();
                header("Location: add_member.php?err=2");
                exit;
            }

            //DB切断
            $pdo = null;
