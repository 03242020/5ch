<?php

session_start( );

include 'dbconnect.php';
include 'common.php';

$db = new DbconnectClass();

if (isset($_SESSION['userId'])) {
    header('Location: ./input.php');
    exit();
}

if (isset($_POST['login'])) {
    //シートログイン押下時の記述
    $err = "";

    if (isBlank($_POST['userID'])) {
        $err = "「ID」";
    }

    if (isBlank($_POST['password'])) {
        $err .= "「パスワード」";
    }

    if (isBlank($err)) {
        $query  =  "select
                        USER_ID,
                        USER_NAME,
                        EMAIL
                    from
                        ACCOUNT
                        where
                        USER_ID=:userID
                        AND USER_PASS=:userPS;";
        $stmt = $db->getDbconnect()->prepare($query);
        $stmt->bindParam(":userID", $_POST['userID'], PDO::PARAM_STR);
    $stmt->bindParam(":userPS", $_POST['password'], PDO::PARAM_STR);
    $stmt->execute();
    $row=$stmt->fetch();

    if (!$row=="") {
      $_SESSION['userId']       =    $row['USER_ID'];
      $_SESSION['username']     =    $row['USER_NAME'];
      $_SESSION['email']        =    $row['EMAIL'];
      $_SESSION['actionName']   =    "index_login";
      header('Location: ./input.php');
      exit();

    } else {
      $err .= "「ID]「パスワード」が存在しません";
    }

  } else {
    $err .="が入力されていません" ;
  }

} else {
  $_SESSION['actionName'] = "index_display";
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/master.css" type="text/css">
  <title>掲示板</title>
</head>
<body>
<header>
掲示板
</header>
<main>
  <div>
    <p>あなたのIDとパスワードを入力してログインしてください。</p>
    <p><?php echo '<FONT COLOR="RED">'.$err.'</FONT>'; ?></p>
    <form action="./index.php" method="POST" >
      <p>
        <label class="itemName">ID:</label>
        <input type="text" name="userID" value="">
      </p>
      <p>
        <label class="itemName">パスワード:</label>
        <input type="password" name="password" value="">
      </p>
      <div>
        <input class="button" type="submit" name="login" value="ログイン">
      </div>
    </form>
  </div>
</main>
</body>
</html>