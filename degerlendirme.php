
<?php
//session_start();
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
        //mysqli_query($conn, $query);
        $sonuç=$pdo->query($query,PDO::FETCH_ASSOC) ;
        echo getRating($post_id);
        exit(0);
    }

    
    




}
else{
    $user_id=0;
}


/*
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
    //mysqli_query($conn, $query);
    $sonuç=$pdo->query($query,PDO::FETCH_ASSOC) ;
    echo getRating($post_id);
    exit(0);
}
*/
function getRating($id){
    $pdo = new PDO("mysql:host=localhost;dbname=php", "root", "");
    
    global $conn;
    $rating = array();

    $likes_query="select count(*) from begeni_bilgisi where soru_id=$id and bilgi='like'";

    $dislikes_query="select count(*) from begeni_bilgisi where soru_id=$id and bilgi='dislike'";

/*
    $sth = $pdo->prepare($likes_query);
    $sth->execute();
    $likes = $sth->fetchAll();

    
    $sth = $pdo->prepare($dislikes_query);
    $sth->execute();
    $dislikes = $sth->fetchAll();
*/
/*
    $likes_rs = mysqli_query($conn, $likes_query);
    $dislikes_rs = mysqli_query($conn, $dislikes_query); 
    $likes = mysqli_fetch_array($likes_rs);
    $dislikes = mysqli_fetch_array($dislikes_rs);
  */  

    
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