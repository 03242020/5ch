<?php
class DbconnectClass {
public function getDbconnect() {
    // DB情報
    $dsn = 'mysql:host=localhost;dbname=SLJ;charset=utf8';
    $user = 'root';
    $password = 'sljslj';

    try {
      // PDOインスタンス化(DB接続)
      $db = new PDO ( $dsn, $user, $password );
      // セキュリティ設定
      $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );
      return $db;
    } catch ( PDOException $e ) {
          header ( 'Location: ./error.php' );
          exit();
      }
}
}