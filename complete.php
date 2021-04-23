<?php
session_start();
session_regenerate_id(true);

if (!isset($_SESSION['userId'])) {
    header('Location: ./index.php');
    exit();
}

if (isset($_POST['back'])) {
    $_SESSION['actionName'] = "complete_back";
    header('Location: ./input.php');
    exit();
}

$_SESSION['actionName'] = "complete_display";

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/master.css" type="text/css">
<title>掲示板</title>
</head>
<body>
<header>
掲示板
</header>
<main>
<div>
    <p>投稿が完了しました。</p>
    <form action="./confirm.php" method="post">
      <p><input class="button" type="submit" name="back" value="一覧画面に戻る"></p>
    </form>
</div>
</main>
</body>
</html>