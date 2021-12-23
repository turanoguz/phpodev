$(document).ready(function(){
    $('.like-btn').on('click',function () {

        let yorum_id=$(this).data('id');
        
        let action;
        $clicked_btn=$(this);

        if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
            action='like'

        }else if($clicked_btn.hasClass('fa-thumbs-up')){
            action='unlike'
        }

        $.ajax({
            url:'yorum_begeni.php', 
            data: {
                'action': action,
                'post_id': yorum_id
            },
            type: 'post',
            dataType: "JSON",
            success: function(data){
                               
                if(action=='like'){
                    
                    $clicked_btn.removeClass('fa-thumbs-o-up')
                    $clicked_btn.addClass('fa-thumbs-up')
                }else if(action='unlike'){
                    $clicked_btn.removeClass('fa-thumbs-up')
                    $clicked_btn.addClass('fa-thumbs-o-up')
                }
                

                $clicked_btn.siblings('span.like').text(data.likes)
  		        $clicked_btn.siblings('span.dislikes').text(data.dislikes)

                $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down')
                
            }
        })

        
    });


    $('.dislike-btn').on('click',function () {

        let yorum_id=$(this).data('id');
        let action;
        $clicked_btn=$(this);
        
        if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
            action='dislike'

        }else if($clicked_btn.hasClass('fa-thumbs-down')){
            action='undislike'
        }

        $.ajax({
            url:'yorum_begeni.php', 
            data: {
                'action': action,
                'post_id': yorum_id
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
                
                

                $clicked_btn.siblings('span.like').text(data.likes);
  		        $clicked_btn.siblings('span.dislikes').text(data.dislikes);
                //$clicked_btn.siblings('span.dislikes').text(data.dislikes);
                $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
            }
        })

        
    })
})

