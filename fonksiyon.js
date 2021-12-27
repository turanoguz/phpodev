


function yorum(){
    
    let data = $("#yorum").serialize()
    
    $.ajax({
        url: "yorum.php",
        data: data,
        type: "post",
        dataType: "JSON",
        success: function (e){
            if(e.hata){
                
                alert(e.hata)

            }else{
            
                
                $("#sonuc").prepend(e.mesaj)
                $("#yorumyaztext").val('')
                
            }

        } 
    });
    
}
