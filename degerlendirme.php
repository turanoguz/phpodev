
<?php

include("database.php");

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['user'])){
    $user_id=$_SESSION['id'];

    if (isset($_POST['action'])) {
        $post_id= $_POST['post_id'];
        $action = $_POST['action'];
        
        
    
        switch ($action) {
            case 'like':
                $query = "insert into begeni_bilgisi(soru_id,user_id,bilgi) 
                values ($post_id,$user_id,'$action') ON DUPLICATE KEY UPDATE bilgi='like'";
                break;
            case 'dislike':
                $query = "insert into begeni_bilgisi(soru_id,user_id,bilgi) 
                values ($post_id,$user_id,'$action') ON DUPLICATE KEY UPDATE bilgi='dislike'";
                break;
            case 'unlike':
                $query = "delete from begeni_bilgisi where user_id=$user_id and soru_id=$post_id";
                break;
            case 'undislike':
                $query = "delete from begeni_bilgisi where user_id=$user_id and soru_id=$post_id";
                break;    
            default:
                
                break;
        }
    
        $sonuç=$pdo->query($query,PDO::FETCH_ASSOC) ;
        echo getRating($post_id);
        exit(0);
    }

    
    




}
else{
    $user_id=0;
}



function getRating($id){
    $pdo = new PDO("mysql:host=localhost;dbname=php", "root", "");
    
    global $conn;
    $rating = array();

    $likes_query="select count(*) from begeni_bilgisi where soru_id=$id and bilgi='like'";

    $dislikes_query="select count(*) from begeni_bilgisi where soru_id=$id and bilgi='dislike'";



    
    $likes=$pdo->query($likes_query)->fetch(PDO::FETCH_BOTH);
    $dislikes=$pdo->query($dislikes_query)->fetch(PDO::FETCH_BOTH);
	
	

    $rating = [
        'likes' => $likes[0],
        'dislikes' => $dislikes[0]
    ];
    
    return json_encode($rating);

}

function getLikes($id){
    $pdo = new PDO("mysql:host=localhost;dbname=php", "root", "");
    global $conn;
    $query="select count(*) from begeni_bilgisi where soru_id = $id and bilgi='like' ";

    $results=$pdo->query($query)->fetch(PDO::FETCH_BOTH);

    return $results[0];

}

function getDisLikes($id){
    $pdo = new PDO("mysql:host=localhost;dbname=php", "root", "");
    global $conn;
    $query="select count(*) from begeni_bilgisi where soru_id = $id and bilgi='dislike' ";

    $results=$pdo->query($query)->fetch(PDO::FETCH_BOTH);

    return $results[0];

}

function userLiked($post_id){
    global $conn;
    global $user_id;
    global $pdo;

    $query = "select * from begeni_bilgisi where user_id=$user_id and soru_id=$post_id and bilgi='like' ";

    $result=$pdo->query($query,PDO::FETCH_ASSOC);

    if($result->rowCount()>0){
        return true;
    }else{
        return false;
    }
}

function userDisLiked($post_id){
    global $conn;
    global $user_id;
    global $pdo;

    $query = "select * from begeni_bilgisi where user_id=$user_id and soru_id=$post_id and bilgi='dislike' ";

    $result=$pdo->query($query,PDO::FETCH_ASSOC);

    if($result->rowCount()>0){
        return true;
    }else{
        return false;
    }
}




?>