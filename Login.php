<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/Style.css">
    
</head>

<body>
    <?php
    
    session_start();
    $adres=$_SERVER['HTTP_REFERER']; 
    
    
    


    //açık oturum varmı kontrol ediyoruz
    if(isset($_SESSION["user"])){
        header("location: index.php");
        exit;
    }

    //database objemizi çağırıyor
    require_once("database.php");

    $email = $password = $userName="";
    $emailError = $passwordError = $loginError="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        //email alanı kontrol
        if(empty(trim($_POST['email']))){
            $emailError= "Lütfen email alanını doldurunuz";
        }else {
            $email=trim($_POST['email']);
        }

        //parola alanını kontrol ediyorruz
        if (empty(trim($_POST['password']))) {
            $passwordError = "Lütfen parola alanını doldurunuz";
        }else{
            $password=trim($_POST['password']);
        }

        if(empty($emailError) && empty($passwordError)){
            $query="select * from users where email=:email and password=:password ";
            if ($stmt = $pdo->prepare($query)) {
                
                $paramEmail=trim($_POST['email']);
                $paramPassword=trim($_POST['password']);
                $stmt->bindParam(":email",$paramEmail,PDO::PARAM_STR);
                $stmt->bindParam(":password",$paramPassword,PDO::PARAM_STR);
                

                if($stmt->execute()){
                    if ($stmt->rowCount()==1 ) {
                        if($row = $stmt->fetch()){
                            $id=$row['ıd'];
                            
                            $userName=$row['name'];
                            $email=$row['email'];
                            session_start();
                            

                            
                            $_SESSION['user']=$userName;
                            $_SESSION['id']=$id;
                            $_SESSION['eposta']=$email;
                            
                            header("location: $adres");
                            
                            exit;

                        }
                        else {
                            $loginError="Geçersiz kullanıcı adı veya parola";
                        }
                    }
                    else{
                        $loginError="Geçersiz kullanıcı adı veya parola";
                    }

                }
                else{
                    echo "Birşeyler ters gitti lütfen daha sonra tekrar deneyiniz";
                }
                unset($stmt);
            }

        }
        unset($pdo);
    }

    
    
    ?>
    
    <div class="login-dark">
            
        <form  method="post" >
            <div>
                <Strong id="strong">
                    <?php 
                        if(!empty($loginError)){
                        echo '<div class="alert alert-danger">' . $loginError . '</div>';
                        }        
                    ?>
                </Strong>
            </div>
            
            <div class="illustration">
                <i class="icon ion-ios-locked-outline"></i>
            </div>
            <div class="form-group">
                <input class="form-control <?php echo (!empty($emailError)) ? 'is-invalid' : ''; ?>" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  name="email" placeholder="E-Posta" value="<?php echo $userName; ?>">
                <span class="invalid-feedback"><?php echo $emailError; ?></span>
            </div>
            <div class="form-group">
                <input class="form-control <?php echo (!empty($passwordError)) ? 'is-invalid' : ''; ?>" type="password" name="password" placeholder="Parola">
                <span class="invalid-feedback"><?php echo $passwordError; ?></span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" id="buttonGonder" type="submit" name="login" >Giriş</button>
            </div>
            </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>