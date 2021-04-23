<?php

function checkEmail($param1) {
//a-zA-Z0-9を1回以上使用し、@test.co.jpのアドレスを固定。
if (!preg_match('{^[a-zA-Z0-9]+@(test\.co\.jp)$}', $param1)) {
    return false;
} else {
    return true;
  }
}
//第一引数にチェック対象、第二引数にリミット
function checkLen($param1, $param2) {
    if (mb_strlen ( $param1 ) > $param2) {
        //第一引数が制限超えてた場合falseを返す
        return false;
    } else {
          //セーフの場合trueを返す
          return true;
      }
}

function isBlank($param1) {
    if ($param1 == "") {
        return true;
    } else {
          return false;
      }
}

?>