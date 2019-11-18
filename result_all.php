<?php

$data = array();
$id = $_GET['id'];
try{
    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    var_dump($e->getMessage());
    exit;
}

$sql = "SELECT id,name,price FROM mst_product where id = ?";
$stmt = $dbh->prepare($sql);
$stmt->execute(array($id));
$rec=$stmt->fetch(PDO::FETCH_ASSOC);


header('Content-type: application/json');
// htmlへ渡配列$productListをjsonに変換する
echo json_encode($rec);

exit;
?>
