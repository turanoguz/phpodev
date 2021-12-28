
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
   
    <script src="https://kit.fontawesome.com/2f6aeee546.js" crossorigin="anonymous"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="css/popup.css">
    
    <style>
      .card-text {
      width: 300px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      }
    </style>
    <?php
      session_start();
      require_once("database.php");
      include("degerlendirme.php");
    ?>

    

  </head>

  <body>
    



    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Sor Gitsin</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
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

    <!-- Page Content -->
    <div class="container">
    <h3 class="mt-4 mb-3">  
			
	
	
	</h3>
      <!-- Page Heading/Breadcrumbs -->
      <h3 class="mt-4 mb-3">SORULAR
       
      </h3>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Anasayfa</a>
        </li>
        <li class="breadcrumb-item active">Sorular </li>
        
      </ol>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php 

         

          $query=$pdo->query("select * from sorular inner join users on users.ıd=sorular.soru_ekleyen order by soru_id desc",PDO::FETCH_ASSOC) ;
          
          if($query->rowCount()){
            foreach($query as $row ){
              $id=$row['soru_id'];
              
              ?>
              
              
              <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title" name="soru_baslık"><?php echo $row['soru_baslık']; ?></h2>
                  <p class="card-text"><?php echo $row['soru_acıklama']; ?></p>
                  <a href="sorudevamı.php?link=<?php echo $row["soru_id"];?>"  class="btn btn-primary" id="soru_id" >Devamını Oku &rarr;</a>
                  
                </div>
            <div class="card-footer text-muted">
            <i class="fas fa-clock" ></i>
              <?php
                $zaman=explode(" ",$row['soru_tarih']);
                echo $zaman[0]." Saat : ".$zaman[1] ;
              ?>
              &nbsp &nbsp
              <i class="fas fa-user-tie"></i>
              <a href="#"><?php echo $row['name'] ?></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              
              <i 
               <?php if(userLiked($row['soru_id'])):   ?>
               class="fa fa-thumbs-up like-btn"
               <?php else: ?>
               class="fa fa-thumbs-o-up like-btn"
               <?php endif ?>
               data-id="<?php echo $row['soru_id']; ?> "  ></i>

               
               

              <span class="likes" ><?php echo  getLikes($row['soru_id'])?></span>
              &nbsp; &nbsp;

              <i <?php if(userDisLiked($row['soru_id'])): ?>
              class="fa fa-thumbs-down dislike-btn" 
              <?php else : ?>
              class="fa fa-thumbs-o-down dislike-btn"
              <?php endif ?>
              data-id="<?php echo $row['soru_id']; ?>"></i>
              <span class="dislikes"><?php echo  getDisLikes($row['soru_id'])?></span>

            </div>
            <div class="goster"></div>
          </div>
          

              <?php
            }


          }else{
            echo '<div class="alert alert-primary">Soru eklenmemiş</div>';

          }
          
          ?>

          



          

          

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

    

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
          
          

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <button class="open-button" onclick="openForm()">Soru Sor</button>
    <?php
    if(isset($_SESSION['user'])){
      echo '
    <div class="form-popup" id="myForm">
      <form action="soru_ekle.php" class="form-container" method="post">
        <h1>Soru Sor</h1>

        <label for="baslık"><b>Başlık</b></label>
        <input type="text" class="form-control" id="validationDefault01" placeholder="Soru Başlığını yazınız" name="sorubaslık" required>
        

        <label for="soru"><b>Soru</b></label>
        <!--<input type="textare" placeholder="Sorunuzu Yazınız" name="1soru" required>-->
        <textarea class="form-control" id="validationDefault01"  name="soru" placeholder="Sorunuzu Yazınız" rows="4" cols="35" required> </textarea>
        
        <label for="psw"><b>Kategori</b></label>
        <select name="kategori" id="kategori">
          <option value="Genel">Genel</option>
          <option value="Araba">Araba</option>
          <option value="ev">EV</option>
          <option value="oyun">Oyun</option>
          <option value="müzik">Müzik</option>
        </select>

        <button type="submit" class="btn">Soruyu Gönder</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Kapat</button>
      </form>
    </div>';}
    else{
      echo '
      <div class="form-popup" id="myForm">
      <form action="login.php" class="form-container">
        

        <label for="info"><b>Soru sormak için lütfen giriş yapınız</b></label>
        <button  class="btn">Giriş Yap</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Kapat</button>
      </form>
    </div>';
    }
    ?>
    
        <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
  
        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
      </script>';
    
    


    
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Sor Gitsin</p>
      </div>
      <!-- /.container -->
    </footer>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="degerlendirme.js"></script>
    

  </body>
</html>