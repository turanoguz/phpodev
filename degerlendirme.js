$(document).ready(function(){
    $('.like-btn').on('click',function () {
        
        let soru_id=$(this).data('id');
        
        
        
        let action;
        $clicked_btn=$(this);
        //console.log($clicked_btn.hasClass==="fa-thumbs-up")
        if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
            action='like'

        }else if($clicked_btn.hasClass('fa-thumbs-up')){
            action='unlike'
        }

        $.ajax({
            url:'degerlendirme.php', 
            data: {
                'action': action,
                'post_id': soru_id
            },
            type: 'post',
            dataType: "JSON",
            success: function(data){
                
               //console.log(typeof(data))
               //res = toObject(data)
               //console.log("data "+data.post_id+"+++"+data.action+" "+typeof(data))
               //res =JSON.parse(JSON.stringify(data))
               //res=JSON.parse(data)
               //console.log("res : "+typeof( res)+" "+res.likes + "  "+res)
               //console.log(res)
               
                if(action=='like'){
                    
                    $clicked_btn.removeClass('fa-thumbs-o-up')
                    $clicked_btn.addClass('fa-thumbs-up')
                }else if(action='unlike'){
                    $clicked_btn.removeClass('fa-thumbs-up')
                    $clicked_btn.addClass('fa-thumbs-o-up')
                }
                //alert(res.likes)
                

                $clicked_btn.siblings('span.likes').text(data.likes)
  		        $clicked_btn.siblings('span.dislikes').text(data.dislikes)

                $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down')
            }
        })

        
    })
    $('.dislike-btn').on('click',function () {
        
        let soru_id=$(this).data('id');
        let action;
        $clicked_btn=$(this);
        //console.log($clicked_btn.hasClass==="fa-thumbs-down")
        if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
            action='dislike'

        }else if($clicked_btn.hasClass('fa-thumbs-down')){
            action='undislike'
        }

        $.ajax({
            url:'degerlendirme.php', 
            data: {
                'action': action,
                'post_id': soru_id
            },
            type: 'post',
            dataType: "JSON",
            success: function(data){
                
            
               
                if(action=='dislike'){
                    
                    $clicked_btn.removeClass('fa-thumbs-o-down')
                    $clicked_btn.addClass('fa-thumbs-down')
                }else if(action='undislike'){
                    $clicked_btn.removeClass('fa-thumbs-down')
                    $clicked_btn.addClass('fa-thumbs-o-down')
                }
                //alert(res.likes)
                

                $clicked_btn.siblings('span.likes').text(data.likes);
  		        $clicked_btn.siblings('span.dislikes').text(data.dislikes);

                $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
                
            }
        })

        
    })
})

