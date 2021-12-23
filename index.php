
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />-->
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
        <button class="yenisoru">Soru Sor </button>
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
			<div class="input-group">
			<input type="text" class="form-control" placeholder="soru ve cevap ara !">
			<span class="input-group-btn">
			<button class="btn btn-secondary" type="button">Ara</button>
			</span>
			</div>
	
	
	
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

          



          

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Ara</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
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
      <form action="/action_page.php" class="form-container">
        <h1>Login</h1>

        <label for="email"><b>Soru</b></label>
        <input type="text" placeholder="Sorunuzu Yazınız" name="yenisoru" required>

        <label for="psw"><b>Kategori</b></label>
        <select name="kategori" id="kategori">
          <option value="Genel">Genel</option>
          <option value="Araba">Araba</option>
        </select>

        <button type="submit" class="btn">Soruyu Gönder</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Kapat</button>
      </form>
    </div>';}
    else{
      echo '
      <div class="form-popup" id="myForm">
      <form action="login.php" class="form-container">
        

        <label for="email"><b>Soru sormak için lütfen giriş yapınız</b></label>
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