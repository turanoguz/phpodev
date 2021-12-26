<?php
session_start();
require_once("database.php");

$baslık=$_POST['sorubaslık'];
$metin=$_POST['soru'];
$id=$_SESSION['id'];

$query="insert into sorular(soru_baslık,soru_acıklama,soru_ekleyen)  
values ('$baslık','$metin',$id) ";

$sonuç=$pdo->query($query,PDO::FETCH_ASSOC) ;
header("location: index.php");
    

?>