<?php
include "common.php";
session_start();

// checkEmail関数のテスト(メルアドチェック関数@test.co.jpになっているか)
$_SESSION[‘email’] = ”cockatiehotest.co.jp”;
checkEmail($_SESSION['email']);

//checkLen関数のテスト(左に文字列、右に数値)
$_SESSION['title'] = "inomata";

checkLen($_SESSION['title'],"8");

// isBlank関数のテスト(空欄チェック)
$_SESSION['text'] = "z";
isBlank($_SESSION['text']);
?>
