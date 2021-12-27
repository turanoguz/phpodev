<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Post - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/postcss.css" rel="stylesheet" />
        <script src="fonksiyon.js"></script>
        <script src="https://kit.fontawesome.com/2f6aeee546.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    </head>
    <body>
    <?php
      session_start();
      require_once("database.php");
      require_once("yorum_begeni.php");
      
    ?>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Sor Gitsin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                            <?php 
                            echo isset($_SESSION['user']) ? $_SESSION['user'] : 'Giriş';  
                            ?>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="logout.php">
                            <?php
                            echo isset($_SESSION['user']) ? 'Çıkış' : '';
                            ?> 
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                
                      
                            <?php
                            $lin = $_GET['link'];

                            //echo $lin;
                            $query=$pdo->query("select * from sorular inner join users on users.ıd = sorular.soru_ekleyen where soru_id={$lin}",PDO::FETCH_ASSOC);
                            /*$row=fetch($query);
                            $kontrol1=$query-rowCount();*/

                            /*$sorgu="select * from sorular inner join users on users.ıd = sorular.soru_ekleyen where soru_id=?";
                            $sorgu->execute(array($lin));
                            $row=fetch($sorgu);
                            $kontrol=$sorgu->rowCount();
                            */

                            if($query->rowCount()){
                                foreach ($query as $row) {
                                    //echo $key['soru_baslık'];
                                    # code...
                                }

                                
                                    ?>
                                    <div class="col-lg-8">
                                        <!-- Post content-->
                                        <article>
                                            <!-- Post header-->
                                            <header class="mb-4">
                                                <!-- Post title-->
                                                <h1 class="fw-bolder mb-1">
                                                    <?php echo $row['soru_baslık']; ?>
                                                </h1>
                                                <!-- Post meta content-->
                                                <div class="text-muted fst-italic mb-2">
                                                <?php
                                                    $zaman=explode(" ",$row['soru_tarih']);
                                                    echo $zaman[0]." Saat : ".$zaman[1] ;
                                                ?>
                                                &nbsp; &nbsp;
                                                <i class="fas fa-user-tie"></i>
                                                <a href="#">
                                                    <?php
                                                    echo $row['name'] 
                                                    ?>
                                                </a>
                                                &nbsp; &nbsp;
                                                
                                                 
                                                </div>

                                                <!-- Post categories-->
                                                <a class="badge bg-secondary text-decoration-none link-light" href="kategori.php?kategori=<?php echo $row['soru_kategori']; ?>"><?php echo $row['soru_kategori']; ?></a>
                                                
                                            </header>
                                            <!-- Post content-->
                                            <section class="mb-5">
                                                <p class="fs-5 mb-4">
                                                    <?php 
                                                    echo $row['soru_acıklama'];
                                                    
                                                    ?>
                                                </p>
                                            </section>
                                        </article>
                                        <!-- Comments section-->
                                        <!--<section class="mb-5">-->
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <?php
                                                    if(isset($_SESSION['user'])){
                                                        ?>
                                                        <!--yorum formu -->
                                                        <div>
                                                            <form action="" id="yorum" onsubmit="return false" class="mb-4" >
                                                                <div><h5>Yorum Yaz</h5></div>
                                                                <div>
                                                                <input type="hidden" name="isim" value="<?php echo $_SESSION['id']; ?>">
                                                                <input type="hidden" name="eposta" value="<?php echo $_SESSION['eposta']; ?>">
                                                                <input type="hidden" name="soru_id" value="<?php echo $row['soru_id']; ?>">
                                                                <textarea id="yorumyaztext" class="form-control" name="mesaj" rows="3" placeholder="Yorumunuzu Yazınız"></textarea>
                                                                <br><button type="submit" name="yorum_yaz" onclick="yorum()" class="btn btn-primary">Gönder</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="sonuc"></div>
                                                        

                                                        <?php
                                                    }
                                                    else{
                                                        ?>

                                                        <div class="alert alert-info">Yorum Yapmak İçin Lütfen <a href="login.php">Giriş</a> Yapınız.</h4></div>
                                                    <?php
                                                    }
                                                    
                                                    ?>
                                                    <?php
                                                    
                                                    $yorumsorgusu=$pdo->query("select * from yorumlar inner join users on users.ıd=yorumlar.yorum_ekleyen where yorum_soru_id={$row['soru_id']} order by yorum_id desc",PDO::FETCH_ASSOC);
                                                    if($yorumsorgusu->rowCount()){
                                                        foreach($yorumsorgusu as $yor){
                                                            ?>
                                                            <!--Yorumlar Listeleme d-flex-->
                                                            
                                                            <div class="d-flex border alert alert-success">
                                                                <div class="flex-shrink-0 "></div>
                                                                    <div class="ms-3">
                                                                    <div class="fw-bold"><?php echo $yor['name']; ?></div> 
                                                                    <?php echo $yor['yorum_mesaj']; ?>
                                                                    <div class="tarih"> <br>
                                                                    <i class="fas fa-clock" ></i>
                                                                    <?php
                                                                        $zaman=explode(" ",$yor['yorum_tarih']);
                                                                        echo $zaman[0]." Saat : ".$zaman[1] ;
                                                                    ?>
                                                                    &nbsp; &nbsp;
                                                                    <i 
                                                                        <?php if(userLiked($yor['yorum_id'])):   ?>
                                                                        class="fa fa-thumbs-up fa-2x like-btn"
                                                                        <?php else: ?>
                                                                        class="fa fa-thumbs-o-up fa-2x like-btn"
                                                                        <?php endif ?>
                                                                        data-id="<?php echo $yor['yorum_id']; ?> "  ></i>

                                                                        
                                                                        

                                                                        <span class="like" ><?php echo  getLikes($yor['yorum_id'])?></span>
                                                                        &nbsp; &nbsp;

                                                                        <i <?php if(userDisLiked($yor['yorum_id'])): ?>
                                                                        class="fa fa-thumbs-down fa-2x dislike-btn" 
                                                                        <?php else : ?>
                                                                        class="fa fa-thumbs-o-down fa-2x dislike-btn"
                                                                        <?php endif ?>
                                                                        data-id="<?php echo $yor['yorum_id']; ?>"></i>
                                                                        <span class="dislikes"><?php echo getDislikes($yor['yorum_id']);?></span>
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            
                                                            <?php

                                                        }

                                                    }else{
                                                        echo '<div class="alert alert-danger">Yorum eklenmemiş</div>';
                                                    }
                                                    
                                                    ?>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        <!--</section>-->
                                    </div>

                                
                                    <?php
                                


                            }

                            ?>
                            
                            
                            
                        
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <div class="card my-4">
                        <h5 class="card-header">Kategoriler</h5>
                    <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
          <?php
            $sorgu=$pdo->query("select distinct soru_kategori from sorular");

            if($sorgu->rowcount()){
              foreach ($sorgu as $item) {
                ?>
                  <li>
                      <a href="kategori.php?kategori=<?php echo $item['soru_kategori']; ?> "><?php echo $item['soru_kategori']; ?></a>
                  </li>

                <?php
              }

            }

          ?>
            </div>
            </div>
            </div>
          </div>
                    
                    
                    <!-- Side widget-->
                    
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="yorum.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        
        
        <!-- Core theme JS    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>-->
        
    </body>
</html>
