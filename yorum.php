<?php
    require_once("database.php");


    if(!isset($_POST['yorum_yaz'])){
        $isim= p("isim",true);
        $mesaj=p("mesaj",true);
        $soruİd=p("soru_id",true);
        $email=p("eposta",true);
        //echo $isim." ".$mesaj." ".$soruİd." ".$email;

        if(!$mesaj){
            $data = array("hata" => "yorum alanı boş bırakılamaz.");
        }
        else{
            $query="insert into yorumlar (yorum_mesaj,yorum_eposta,yorum_ekleyen,yorum_soru_id) values(?,?,?,?)";
            $stm=$pdo->prepare($query);
            $ok=$stm->execute([$mesaj,$email,$isim,$soruİd]);
            

            

            if($ok){
                $yorumsorgusu=$pdo->query("select * from yorumlar inner join users on users.ıd=yorumlar.yorum_ekleyen where yorum_soru_id={$soruİd} order by yorum_id desc",PDO::FETCH_ASSOC);
                if($yorumsorgusu->rowCount()){
                    foreach($yorumsorgusu as $rows){
                        $data=array("ok"=>"Yorumunuz başarıyla gönderildi");
                        
                        
                        $data['mesaj']= 
                        '
                        <!--Yorumlar Listeleme-->
                        <div class="d-flex alert alert-danger">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                <div class="fw-bold">'.$rows['name'].'</div> 
                                '.$mesaj.'
                            </div>
                        </div>
                
                ';
                
                        
                    }
                }
                
            }else{
                $data=array("hata"=>"yorum gönderilirken bir sorun oluştu");
            }

        }


    }else{
        echo "bir hata yaşandı daha sonra tekrar deneyiniz";

    }
    

    function p($par,$st = false) {
		
		if($st){
			
			return strip_tags(trim($_POST[$par]));
			
		}else{
			
			return trim($_POST[$par]);
			
		}
		
	}

    
  echo json_encode($data);

?>
