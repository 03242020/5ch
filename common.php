<?php
// DB情報
$dsn = 'mysql:host=localhost;dbname=SLJ;charset=utf8';
$user = 'root';
$password = 'sljslj';
try {
// PDOインスタンス化(DB接続)
$db = new PDO ( $dsn, $user, $password );
// セキュリティ設定
$db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );
} catch ( PDOException $e ) {
die ( 'エラー' . $e->getMessage () );
}

function checkEmail($param1){
	//$param1 = $_SESSION['email'];
	if(strspn($param1,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@')
			!==strlen($param1)){
		//他の文字がある場合の処理
		echo "false";
	}else if(strpos($param1,'@test.co.jp') !== false){
		echo "true";
	}else{
		echo "false";
	}


	function checkLen($param1,$param2){
		//	$param1 = $_SESSION['']

		if(mb_strlen($param1) > $param2){
			echo "false";
		}else{
			echo "true";
		}
	}


function isBlank($param1){
	if($param1 == ""){
		echo "true";
	}else{
		echo "false";
	}
}
}
		?>