<?php
session_start();
require_once("database.php");

$baslık=$_POST['sorubaslık'];
$metin=$_POST['soru'];
$id=$_SESSION['id'];
$kategori=$_POST['kategori'];

$query="insert into sorular(soru_baslık,soru_acıklama,soru_ekleyen,soru_kategori)  
values ('$baslık','$metin',$id,'$kategori') ";

$sonuç=$pdo->query($query,PDO::FETCH_ASSOC) ;
header("location: index.php");
    

?>